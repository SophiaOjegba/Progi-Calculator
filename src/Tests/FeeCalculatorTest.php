<?php

namespace App\Tests\Service;

use App\Service\FeeCalculator;
use App\Entity\Vehicle;
use PHPUnit\Framework\TestCase;

class FeeCalculatorTest extends TestCase
{
    public function testCalculateTotalCostForCommonVehicle()
    {
        $vehicle = new Vehicle(1000, 'Common');
        $feeCalculator = new FeeCalculator();
        $result = $feeCalculator->calculateTotalCost($vehicle);

        $this->assertEquals(1180, $result['totalCost']);
    }

    public function testCalculateTotalCostForLuxuryVehicle()
    {
        $vehicle = new Vehicle(1800, 'Luxury');
        $feeCalculator = new FeeCalculator();
        $result = $feeCalculator->calculateTotalCost($vehicle);

        $this->assertEquals(2167, $result['totalCost']);
    }
}
