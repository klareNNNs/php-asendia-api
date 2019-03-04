<?php

declare(strict_types=1);

namespace klareNNNs\asendia\Entity;

final class OrderLine
{
    private $countryOfOrigin;
    private $description1;
    private $harmonizationCode;
    private $quantityShipped;
    private $unitPrice;

    public function __construct(string $countryOfOrigin, string $description1, int $harmonizationCode, int $quantityShipped, float $unitPrice)
    {
        $this->countryOfOrigin = $countryOfOrigin;
        $this->description1 = $description1;
        $this->harmonizationCode = $harmonizationCode;
        $this->quantityShipped = $quantityShipped;
        $this->unitPrice = $unitPrice;
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

    public function getQuantityShipped(): int
    {
        return $this->quantityShipped;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }
}