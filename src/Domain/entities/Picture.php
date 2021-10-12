<?php

declare(strict_types=1);

namespace App\Domain;

final class Picture
{
    private int $id;
    private string $url;
    private string $quality;

    /**
     * Picture constructor.
     * @param int $id
     * @param String $url
     * @param String $quality
     */
    public function __construct(int $id, string $url, string $quality)
    {
        $this->id = $id;
        $this->url = $url;
        $this->quality = $quality;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param String $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return String
     */
    public function getQuality(): string
    {
        return $this->quality;
    }

    /**
     * @param String $quality
     */
    public function setQuality(string $quality): void
    {
        $this->quality = $quality;
    }

}
