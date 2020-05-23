<?php

declare(strict_types=1);

namespace App\Service;

interface ProcessorInterface
{
    /**
     * @return int
     */
    public function getMaxSpeed(): int;

    /**
     * @return int
     */
    public function calculateConsumptionFuel(): int;

    /**
     * @return int
     */
    public function calculateConsumptionOil(): int;

    /**
     * @return int
     */
    public function calculateDistance(): int;

    /**
     * @return int
     */
    public function calculateOperatingCosts(): int;

}