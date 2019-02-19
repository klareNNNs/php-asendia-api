<?php

declare(strict_types=1);

namespace klareNNNs\asendia\Entity;

final class Parcel
{
    private $orderLines;
    private $parcelIdentifier;
    private $weight;

    public function __construct(array $orderLines, int $parcelIdentifier, float $weight = 1)
    {
        $this->orderLines = $orderLines;
        $this->parcelIdentifier = $parcelIdentifier;
        $this->weight = $weight;
    }


    public function getOrderLines() : array
    {
        return $this->orderLines;
    }

    public function getParcelIdentifier(): int
    {
        return $this->parcelIdentifier;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }



}