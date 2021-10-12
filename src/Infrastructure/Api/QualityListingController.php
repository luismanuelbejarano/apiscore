<?php

declare(strict_types=1);

namespace App\Infrastructure\Api;

use App\Domain\services\AdsQualityListService;
use App\Domain\services\AdsScoreCalculatorService;
use App\Infrastructure\Persistence\InFileSystemPersistence;
use Symfony\Component\HttpFoundation\JsonResponse;

final class QualityListingController
{
    public function __invoke(AdsScoreCalculatorService $adsScoreCalculatorService, InFileSystemPersistence $data, AdsQualityListService $adsQualityListService): JsonResponse
    {
        //calculate score
        $ads=$adsScoreCalculatorService->calculateTotalScore($data->getAds(),$data->getPictures(),true);
        //get list for quality responsible
        $publicList=$adsQualityListService->getQualityList($ads, $data->getPictures());
        $response=new JsonResponse($publicList);
        $response->setEncodingOptions( $response->getEncodingOptions() | JSON_PRETTY_PRINT );
        return $response;
    }
}
