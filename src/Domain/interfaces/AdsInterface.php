<?php


namespace App\Domain\interfaces;

use App\Domain\Ad;

/**
 * Any repository must implement these methods regardless of its source
 *
 * Interface AdsInterface
 * @package App\Domain\interfaces
 */
interface AdsInterface
{

    /**
     * return array with all the ads
     *
     * @return array
     */
    public function getList(): array;

    public function update(Ad $ad): void;

}