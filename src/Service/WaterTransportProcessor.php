<?php

declare(strict_types=1);

namespace App\Service;

use App\Service\TransportProcessor;


class WaterTransportProcessor extends TransportProcessor
{
    /**
     * @param array $params
     * @return float|int
     */
    public function calculateMaxSpeed(array $params)
    {
        [$enginePower, $externalWeight] = $params;

        return ((int)$enginePower / (int)$externalWeight) * 1000;
    }

    /**
     * @inheritDoc
     * @param array $params
     * @return int|float
     */
    public function calculateOperatingCosts(array $params)
    {
        [$fuel, $oil, $timeLine] = $params;

        return ((int)$fuel + (int)$oil) * (int)$timeLine;
    }
}