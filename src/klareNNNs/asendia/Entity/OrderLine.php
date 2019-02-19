<?php

declare(strict_types=1);

namespace klareNNNs\asendia\Entity;

final class OrderLine
{
    private $countryOfOrigin;
    private $description1;
    private $harmonizationCode;

    public function __construct(string $countryOfOrigin, string $description1, int $harmonizationCode)
    {
        $this->countryOfOrigin = $countryOfOrigin;
        $this->description1 = $description1;
        $this->harmonizationCode = $harmonizationCode;
    }

    public function getCountryOfOrigin(): string
    {
        return $this->countryOfOrigin;
    }

    public function getDescription1(): string
    {
        return $this->description1;
    }

    public function getHarmonizationCode(): int
    {
        return $this->harmonizationCode;
    }



}