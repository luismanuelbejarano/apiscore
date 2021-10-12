<?php


namespace App\Domain\services;


use App\Infrastructure\Api\PublicAd;

class AdsPublicListService
{
    public function getPublicList($data, $pictures): array
    {
        $response = [];
        foreach ($data as $item) {
            if ($item->getIrrelevantSince() !== null) {
                $thePictures=$item->searchPicture($item->getPictures(), $pictures);
                $publicAd = new PublicAd(
                    $item->getScore(),
                    $item->getId(),
                    $item->getTypology(),
                    $item->getDescription(),
                    $thePictures,
                    $item->getHouseSize(),
                    $item->getGardenSize()
                );

                array_push($response,$publicAd->getData($thePictures));
            }
        }
        usort($response, function($a, $b) {
            return $a[0] <=> $b[0];
        });
        rsort($response);
        return $response;
    }
}