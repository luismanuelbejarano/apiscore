<?php

declare(strict_types=1);

namespace App\Infrastructure\Api;

final class PublicAd
{
    private int $id;
    private string $typology;
    private string $description;
    private int $score;
    private array $pictureUrls;
    private int $houseSize;
    private ?int $gardenSize;

    /**
     * PublicAd constructor.
     * @param int $score
     * @param int $id
     * @param string $typology
     * @param string $description
     * @param array $pictureUrls
     * @param int $houseSize
     * @param int|null $gardenSize
     */
    public function __construct(
        int $score,
        int $id,
        string $typology,
        string $description,
        array $pictureUrls,
        int $houseSize,
        ?int $gardenSize
    ) {
        $this->score = $score;
        $this->id = $id;
        $this->typology = $typology;
        $this->description = $description;
        $this->pictureUrls = $pictureUrls;
        $this->houseSize = $houseSize;
        $this->gardenSize = $gardenSize;
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
        ];
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
     * @return string
     */
    public function getTypology(): string
    {
        return $this->typology;
    }

    /**
     * @param string $typology
     */
    public function setTypology(string $typology): void
    {
        $this->typology = $typology;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
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
     * @return string
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param string $score
     */
    public function setScore(int $score): void
    {
        $this->score = $score;
    }
}
