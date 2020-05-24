<?php

declare(strict_types=1);

namespace App\Service;

use App\Service\ProcessorInterface;

class TransportProcessor implements ProcessorInterface
{
    /**
     * @inheritDoc
     * @param int $distance
     * @param int $time
     * @return int
     */
    public function getMaxSpeed(int $distance, int $time): int
    {
        return $distance / $time;
    }

    /**
     * @inheritDoc
     * @param int $weight
     * @param int $speed
     * @param int $distance
     * @return int
     */
    public function calculateConsumptionFuel(int $weight, int $speed, int $distance): int
    {
       return ((($distance/ $speed) * 100) - $weight) / -100;
    }

    /**
     * @inheritDoc
     * @param int $weight
     * @param int $speed
     * @param int $distance
     * @return int
     */
    public function calculateConsumptionOil(int $weight, int $speed, int $distance): int
    {
        return ((($distance/ $speed) * 100) - $weight) / -10;
    }

    /**
     * @inheritDoc
     * @param int $externalWeight
     * @param int $fuelQty
     * @param int $fuelConsumptionPerHundredKilometers
     * @return int
     */
    public function calculateDistance(int $externalWeight, int $fuelQty, int $fuelConsumptionPerHundredKilometers): int
    {
       $expectedDistance = ($fuelQty/ $fuelConsumptionPerHundredKilometers) * 100 ;
       $differenceInDistance = $externalWeight / 10;

       return $expectedDistance - $differenceInDistance;
    }

    /**
     * @inheritDoc
     * @param array $params
     * @return int
     */
    public function calculateOperatingCosts(array $params): int
    {
        return 1;
    }
}