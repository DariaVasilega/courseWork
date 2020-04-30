<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehicleRepository")
 */
class Vehicle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $appointment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $engineType;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numberOfPassengers;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxSpeed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fuelCost;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $size;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppointment(): ?string
    {
        return $this->appointment;
    }

    public function setAppointment(?string $appointment): self
    {
        $this->appointment = $appointment;

        return $this;
    }

    public function getEngineType(): ?string
    {
        return $this->engineType;
    }

    public function setEngineType(?string $engineType): self
    {
        $this->engineType = $engineType;

        return $this;
    }

    public function getNumberOfPassengers(): ?int
    {
        return $this->numberOfPassengers;
    }

    public function setNumberOfPassengers(?int $numberOfPassengers): self
    {
        $this->numberOfPassengers = $numberOfPassengers;

        return $this;
    }

    public function getMaxSpeed(): ?int
    {
        return $this->maxSpeed;
    }

    public function setMaxSpeed(?int $maxSpeed): self
    {
        $this->maxSpeed = $maxSpeed;

        return $this;
    }

    public function getFuelCost(): ?int
    {
        return $this->fuelCost;
    }

    public function setFuelCost(?int $fuelCost): self
    {
        $this->fuelCost = $fuelCost;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->size = $size;

        return $this;
    }
}
