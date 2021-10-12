<?php

declare(strict_types=1);

namespace App\Infrastructure\Api;

use DateTimeImmutable;

final class QualityAd
{
    private int $id;
        private String $typology;
        private String $description;
        private array $pictureUrls;
        private int $houseSize;
        private ?int $gardenSize = null;
        private ?int $score = null;
        private ?DateTimeImmutable $irrelevantSince = null;

    /**
     * QualityAd constructor.
     * @param int $id
     * @param String $typology
     * @param String $description
     * @param array $pictureUrls
     * @param int $houseSize
     * @param int|null $gardenSize
     * @param int|null $score
     * @param DateTimeImmutable|null $irrelevantSince
     */
    public function __construct(
        ?int $score,
        int $id,
        string $typology,
        string $description,
        array $pictureUrls,
        int $houseSize,
        ?int $gardenSize,
        ?DateTimeImmutable $irrelevantSince
    ) {
        $this->id = $id;
        $this->typology = $typology;
        $this->description = $description;
        $this->pictureUrls = $pictureUrls;
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
    public function getPictureUrls(): array
    {
        return $this->pictureUrls;
    }

    /**
     * @param array $pictureUrls
     */
    public function setPictureUrls(array $pictureUrls): void
    {
        $this->pictureUrls = $pictureUrls;
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
    public function getData($pictures): array
    {
        return [
            $this->getScore(),
            $this->getId(),
            $this->getTypology(),
            $this->getDescription(),
            $pictures,
            $this->getHouseSize(),
            $this->getGardenSize(),
            $this->getIrrelevantSince()
        ];
    }
}
