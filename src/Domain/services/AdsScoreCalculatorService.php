<?php


namespace App\Domain\services;


/**
 * Class AdsScoreCalculatorService
 * @package App\Domain\services
 */
class AdsScoreCalculatorService
{
    //POINTS CONST
    const NOPHOTO = -10;
    const HDPHOTO = 20;
    const SDPHOTO = 10;
    const HD = "HD";
    const DESCRIPTION = 5;
    const FLAT = "FLAT";
    const CHALET = "CHALET";
    const GARAGE = "GARAGE";
    const DESCRIPTION_SIZE = ["pisoA" => 10, "pisoB" => 30, "chalet" => 20];
    const WORD_PRESENT = ["luminoso", "nuevo", "céntrico", "reformado", "ático"];
    const KEYWORD_POINTS = 5;
    const COMPLETE = 40;
    const MIN = 0;
    const MAX = 100;
    const IRRELEVANT_SCORE = 40;


    /**
     * calculate total score of all ads received
     *
     * @param $ads
     * @param $images
     * @return array
     */
    public function calculateTotalScore($ads, $images, $object): array
    {
        $response = [];
        foreach ($ads as $ad) {
            $ad->setScore(0);

            //get Score if picture is present
            if (sizeof($ad->getPictures()) == 0) {
                $ad->setScore($ad->getScore() + self::NOPHOTO);
            } else {
                foreach ($ad->getPictures() as $image) {
                    //get picture score based on image
                    foreach ($images as $pic) {
                        if ($image == $pic->getId()) {
                            if ($pic->getQuality() === self::HD) {
                                $ad->setScore($ad->getScore() + self::HDPHOTO);
                            } else {
                                $ad->setScore($ad->getScore() + self::SDPHOTO);
                            }
                            break;
                        }
                    }
                }
            }


            //get score if description is present
            $numberOfWords = str_word_count($ad->getDescription());
            if ($numberOfWords > 0) {
                $ad->setScore($ad->getScore() + self::DESCRIPTION);
            }

            //get score based on description word
            if (mb_strtolower($ad->getTypology()) === mb_strtolower(self::FLAT)) {
                if ($numberOfWords >= 20 && $numberOfWords <= 49) {
                    $ad->setScore($ad->getScore() + self::DESCRIPTION_SIZE["pisoA"]);
                } else {
                    if ($numberOfWords >= 50) {
                        $ad->setScore($ad->getScore() + self::DESCRIPTION_SIZE["pisoB"]);
                    }
                }
            } elseif (mb_strtolower($ad->getTypology()) === mb_strtolower(self::CHALET)) {
                if ($numberOfWords > 50) {
                    $ad->setScore($ad->getScore() + self::DESCRIPTION_SIZE["chalet"]);
                }
            }

            //get score base on key words
            foreach (self::WORD_PRESENT as $keyword) {
                $adwords = mb_strtolower($ad->getDescription());
                if (str_contains($adwords, $keyword)) {
                    $ad->setScore($ad->getScore() + self::KEYWORD_POINTS);
                }
            }

            //check if ad is complete
            $isAdComplete = true;

            if (sizeof($ad->getPictures()) == 0 || ($numberOfWords <= 0 && !(mb_strtolower(
                            $ad->getTypology()
                        ) === mb_strtolower(self::GARAGE)))) {
                $isAdComplete = false;
            }

            if (mb_strtolower($ad->getTypology()) === mb_strtolower(self::FLAT) && $ad->getHouseSize() <= 0) {
                $isAdComplete = false;
            }

            if (mb_strtolower($ad->getTypology()) === mb_strtolower(self::CHALET) && ($ad->getHouseSize(
                    ) <= 0 || $ad->getGardenSize() <= 0)) {
                $isAdComplete = false;
            }

            if ($isAdComplete) {
                $ad->setScore($ad->getScore() + self::COMPLETE);
            }

            //check limitS
            if ($ad->getScore() < self::MIN) {
                $ad->setScore(self::MIN);
            }
            if ($ad->getScore() > self::MAX) {
                $ad->setScore(self::MAX);
            }

            //set relevance date
            if ($ad->getScore() !== null && $ad->getScore() < self::IRRELEVANT_SCORE) {
                date_default_timezone_set('Europe/Madrid');
                $ad->setIrrelevantSince(date_create_immutable());
            } else {
                $ad->setIrrelevantSince(null);
            }

            $dataReturn = $ad;
            if (!$object) {
                $dataReturn = $ad->getData();
            }

            array_push($response, $dataReturn);
        }
        return $response;
    }
}