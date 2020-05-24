<?php

declare(strict_types=1);

namespace App\Service;

use App\Service\TransportProcessor;


class WaterTransportProcessor extends TransportProcessor
{
    public function getMaxSpeed(int $externalWeight, int $enginePower): int
    {
        return ($enginePower / $externalWeight) * 1000;
    }

    /**
     * @inheritDoc
     * @param array $params
     * @return int
     */
    public function calculateOperatingCosts(array $params): int
    {
        [$fuel, $oil, $timeLine] = $params;

        return ($fuel + $oil) * $timeLine;
    }
}