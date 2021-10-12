<?php

declare(strict_types=1);

namespace App\Infrastructure\Api;

use App\Domain\services\AdsScoreCalculatorService;
use App\Infrastructure\Persistence\InFileSystemPersistence;
use Symfony\Component\HttpFoundation\JsonResponse;


final class CalculateScoreController
{
    public function __invoke(AdsScoreCalculatorService $adsScoreCalculatorService, InFileSystemPersistence $data): JsonResponse
    {
        //calculate ads score using service and return response in json format
        $ads=$adsScoreCalculatorService->calculateTotalScore($data->getAds(),$data->getPictures(),false);
        $response=new JsonResponse($ads);
        $response->setEncodingOptions( $response->getEncodingOptions() | JSON_PRETTY_PRINT );
        return $response;
    }

}
