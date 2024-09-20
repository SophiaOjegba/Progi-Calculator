<?php

namespace App\Entity;

class Vehicle
{
    private float $basePrice;
    private string $type;

    public function __construct(float $basePrice, string $type)
    {
        $this->basePrice = $basePrice;
        $this->type = $type;
    }

    public function getBasePrice(): float
    {
        return $this->basePrice;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
