<?php

declare(strict_types=1);

namespace App\Domain;

use DateTimeImmutable;

final class Ad
{
    const NOPHOTO = -10;
    const HDPHOTO = 20;
    const SDPHOTO = 10;
    const HD = "HD";

    private int $id;
    private string $typology;
    private string $description;
    private array $pictures;
    private int $houseSize;
    private ?int $gardenSize = null;
    private ?int $score = null;
    private ?DateTimeImmutable $irrelevantSince = null;

    /**
     * Ad constructor.
     * @param int $id
     * @param String $typology
     * @param String $description
     * @param array $pictures
     * @param int $houseSize
     * @param int|null $gardenSize
     * @param int|null $score
     * @param DateTimeImmutable|null $irrelevantSince
     */
    public function __construct(
        int $id,
        string $typology,
        string $description,
        array $pictures,
        int $houseSize,
        ?int $gardenSize,
        ?int $score,
        ?DateTimeImmutable $irrelevantSince
    ) {
        $this->id = $id;
        $this->typology = $typology;
        $this->description = $description;
        $this->pictures = $pictures;
        $this->houseSize = $houseSize;
        $this->gardenSize = $gardenSize;
        $this->score = $score;
        $this->irrelevantSince = $irrelevantSince;
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
    public function getTypology(): string
    {
        return $this->typology;
    }

    /**
     * @param String $typology
     */
    public function setTypology(string $typology): void
    {
        $this->typology = $typology;
    }

    /**
     * @return String
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param String $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getPictures(): array
    {
        return $this->pictures;
    }

    /**
     * @param array $pictures
     */
    public function setPictures(array $pictures): void
    {
        $this->pictures = $pictures;
    }

    /**
     * @return int
     */
    public function getHouseSize(): int
    {
        return $this->houseSize;
    }

    /**
     * @param int $houseSize
     */
    public function setHouseSize(int $houseSize): void
    {
        $this->houseSize = $houseSize;
    }

    /**
     * @return int|null
     */
    public function getGardenSize(): ?int
    {
        return $this->gardenSize;
    }

    /**
     * @param int|null $gardenSize
     */
    public function setGardenSize(?int $gardenSize): void
    {
        $this->gardenSize = $gardenSize;
    }

    /**
     * @return int|null
     */
    public function getScore(): ?int
    {
        return $this->score;
    }

    /**
     * @param int|null $score
     */
    public function setScore(?int $score): void
    {
        $this->score = $score;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getIrrelevantSince(): ?DateTimeImmutable
    {
        return $this->irrelevantSince;
    }

    /**
     * @param DateTimeImmutable|null $irrelevantSince
     */
    public function setIrrelevantSince(?DateTimeImmutable $irrelevantSince): void
    {
        $this->irrelevantSince = $irrelevantSince;
    }

    public function getData(): array
    {
        return [
            $this->getId(),
            $this->getTypology(),
            $this->getDescription(),
            $this->getPictures(),
            $this->getHouseSize(),
            $this->getGardenSize(),
            $this->getScore(),
            $this->getIrrelevantSince()
        ];
    }
}
