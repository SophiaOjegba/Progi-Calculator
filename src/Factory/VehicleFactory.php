<?php

namespace App\Factory;

use App\Entity\Vehicle;

class VehicleFactory
{
    public static function createVehicle(float $basePrice, string $type): Vehicle
    {
        return new Vehicle($basePrice, $type);
    }
}
