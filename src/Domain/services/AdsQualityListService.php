<?php


namespace App\Domain\services;


use App\Infrastructure\Api\QualityAd;

class AdsQualityListService
{
    public function getPublicList($data, $pictures): array
    {
        $response = [];
        foreach ($data as $item) {
                $thePictures=$item->searchPicture($item->getPictures(), $pictures);
                $qualityAd = new QualityAd(
                    $item->getScore(),
                    $item->getId(),
                    $item->getTypology(),
                    $item->getDescription(),
                    $thePictures,
                    $item->getHouseSize(),
                    $item->getGardenSize(),
                    $item->getIrrelevantSince());
                array_push($response,$qualityAd->getData($thePictures));
            }

        usort($response, function($a, $b) {
            return $a[0] <=> $b[0];
        });
        rsort($response);
        return $response;
    }
}