<?php

declare(strict_types=1);

namespace App\Service;

interface ProcessorInterface
{
    /**
     * @param array $params
     * @return int|float
     */
    public function calculateConsumptionFuel(array $params);

    /**
     * @param array $params
     * @return int|float
     */
    public function calculateConsumptionOil(array $params);

    /**
     * @param array $params
     * @return int|float
     */
    public function calculateDistance(array $params);

    /**
     * @param array $params
     * @return int|float
     */
    public function calculateOperatingCosts(array $params);

}