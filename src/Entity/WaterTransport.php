<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\BaseEntityTransport as Transport;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WaterTransportRepository")
 */
class WaterTransport extends Transport
{
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lifeboard;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $mastQty;

    public function getLifeboard(): ?int
    {
        return $this->lifeboard;
    }

    public function setLifeboard(?int $lifeboard): self
    {
        $this->lifeboard = $lifeboard;

        return $this;
    }

    public function getMastQty(): ?int
    {
        return $this->mastQty;
    }

    public function setMastQty(int $mastQty): self
    {
        $this->mastQty = $mastQty;

        return $this;
    }
}
