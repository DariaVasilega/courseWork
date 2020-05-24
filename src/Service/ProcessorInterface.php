<?php

declare(strict_types=1);

namespace App\Service;

interface ProcessorInterface
{
    /**
     * @param int $weight
     * @param int $speed
     * @param int $distance
     * @return int
     */
    public function calculateConsumptionFuel(int $weight, int $speed, int $distance): int;

    /**
     * @param int $weight
     * @param int $speed
     * @param int $distance
     * @return int
     */
    public function calculateConsumptionOil(int $weight, int $speed, int $distance): int;

    /**
     * @param int $externalWeight
     * @param int $fuelQty
     * @param int $fuelConsumptionPerHundredKilometers
     * @return int
     */
    public function calculateDistance(int $externalWeight, int $fuelQty, int $fuelConsumptionPerHundredKilometers): int;

    /**
     * @param array $params
     * @return int
     */
    public function calculateOperatingCosts(array $params): int;

}