<?php

declare(strict_types=1);

namespace App\Service;

use App\Service\ProcessorInterface;

class TransportProcessor implements ProcessorInterface
{
    /**
     * @param array $params
     * @return int|float
     */
    public function calculateMaxSpeed(array $params)
    {
        [$distance, $time] = $params;

        return (int)$distance / (int)$time;
    }

    /**
     * @inheritDoc
     * @param int $weight
     * @param int $speed
     * @param int $distance
     * @return int|float
     */
    public function calculateConsumptionFuel(array $params)
    {
        [$weight, $speed, $distance] = $params;

       return ((((int)$distance / (int)$speed) * 100) - (int)$weight) / -100;
    }

    /**
     * @inheritDoc
     * @param int $weight
     * @param int $speed
     * @param int $distance
     * @return int|float
     */
    public function calculateConsumptionOil(array $params)
    {
        [$weight, $speed, $distance] = $params;

        return ((((int)$distance / (int)$speed) * 100) - (int)$weight) / -10;
    }

    /**
     * @inheritDoc
     * @param int $externalWeight
     * @param int $fuelQty
     * @param int $fuelConsumptionPerHundredKilometers
     * @return int|float
     */
    public function calculateDistance(array $params)
    {
       [$externalWeight, $fuelQty, $fuelConsumptionPerHundredKilometers] = $params;
       $expectedDistance = ((int)$fuelQty / (int)$fuelConsumptionPerHundredKilometers) * 100 ;
       $differenceInDistance = (int)$externalWeight / 10;

       return $expectedDistance - $differenceInDistance;
    }

    /**
     * @inheritDoc
     * @param array $params
     * @return int|float
     */
    public function calculateOperatingCosts(array $params)
    {
        return 1;
    }
}