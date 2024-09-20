<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Service\FeeCalculator;
use App\Factory\VehicleFactory;

class VehicleController extends AbstractController
{
    private FeeCalculator $feeCalculator;

    public function __construct(FeeCalculator $feeCalculator)
    {
        $this->feeCalculator = $feeCalculator;
    }

    #[Route('/api/calculate', name: 'calculate_fees', methods: ['GET'])]
    public function calculate(Request $request): JsonResponse
    {
        $basePrice = (float) $request->query->get('basePrice');
        $vehicleType = $request->query->get('vehicleType');

        $vehicle = VehicleFactory::createVehicle($basePrice, $vehicleType);
        $result = $this->feeCalculator->calculateTotalCost($vehicle);

        return new JsonResponse($result);
    }
}
