<?php

declare(strict_types=1);

namespace App\Infrastructure\Api;

use App\Domain\services\AdsPublicListService;
use App\Domain\services\AdsScoreCalculatorService;
use App\Infrastructure\Persistence\InFileSystemPersistence;
use Symfony\Component\HttpFoundation\JsonResponse;

final class PublicListingController
{
    public function __invoke(AdsScoreCalculatorService $adsScoreCalculatorService, InFileSystemPersistence $data, AdsPublicListService $adsPublicListService): JsonResponse
    {
        //calculate score
        $ads=$adsScoreCalculatorService->calculateTotalScore($data->getAds(),$data->getPictures(),true);
        //get public list using service
        $publicList=$adsPublicListService->getPublicList($ads,$data->getPictures());
        $response=new JsonResponse($publicList);
        $response->setEncodingOptions( $response->getEncodingOptions() | JSON_PRETTY_PRINT );
        return $response;
    }
}
