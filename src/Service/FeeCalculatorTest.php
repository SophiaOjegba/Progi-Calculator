<?php

namespace App\Service;

use App\Entity\Vehicle;

class FeeCalculator
{
    public function calculateTotalCost(Vehicle $vehicle): array
    {
        $fees = $this->calculateFees($vehicle);
        $totalCost = $vehicle->getBasePrice() + array_sum($fees);

        return [
            'fees' => $fees,
            'totalCost' => $totalCost
        ];
    }

    private function calculateFees(Vehicle $vehicle): array
    {
        $basePrice = $vehicle->getBasePrice();
        $vehicleType = $vehicle->getType();

        $basicBuyerFee = ($vehicleType === 'Luxury') ? min(max(0.10 * $basePrice, 25), 200) : min(max(0.10 * $basePrice, 10), 50);
        
        $specialFee = ($vehicleType === 'Luxury') ? 0.04 * $basePrice : 0.02 * $basePrice;
        
        $associationFee = $this->getAssociationFee($basePrice);

        $storageFee = 100;

        return [
            'basicBuyerFee' => $basicBuyerFee,
            'specialFee' => $specialFee,
            'associationFee' => $associationFee,
            'storageFee' => $storageFee
        ];
    }

    private function getAssociationFee(float $basePrice): int
    {
        if ($basePrice <= 500) {
            return 5;
        } elseif ($basePrice <= 1000) {
            return 10;
        } elseif ($basePrice <= 3000) {
            return 15;
        } else {
            return 20;
        }
    }
}
