<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BaseEntityTransportRepository")
 */
class BaseEntityTransport
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=63)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=63)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="Engine", inversedBy="baseEntityTransports")
     */
    private $engineType;

    /**
     * @ORM\Column(type="integer")
     */
    private $seatsQty;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Material", inversedBy="baseEntityTransports")
     */
    private $material;

    /**
     * @ORM\Column(type="string", length=63)
     */
    private $size;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $weight;

    /**
     * @ORM\Column(type="integer")
     */
    private $carryingCapacity;

    public function __construct()
    {
        $this->engineType = new ArrayCollection();
        $this->material = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Engine[]
     */
    public function getEngineType(): Collection
    {
        return $this->engineType;
    }

    public function addEngineType(Engine $engineType): self
    {
        if (!$this->engineType->contains($engineType)) {
            $this->engineType[] = $engineType;
        }

        return $this;
    }

    public function removeEngineType(Engine $engineType): self
    {
        if ($this->engineType->contains($engineType)) {
            $this->engineType->removeElement($engineType);
        }

        return $this;
    }

    public function getSeatsQty(): ?int
    {
        return $this->seatsQty;
    }

    public function setSeatsQty(int $seatsQty): self
    {
        $this->seatsQty = $seatsQty;

        return $this;
    }

    /**
     * @return Collection|Material[]
     */
    public function getMaterial(): Collection
    {
        return $this->material;
    }

    public function addMaterial(Material $material): self
    {
        if (!$this->material->contains($material)) {
            $this->material[] = $material;
        }

        return $this;
    }

    public function removeMaterial(Material $material): self
    {
        if ($this->material->contains($material)) {
            $this->material->removeElement($material);
        }

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getCarryingCapacity(): ?int
    {
        return $this->carryingCapacity;
    }

    public function setCarryingCapacity(int $carryingCapacity): self
    {
        $this->carryingCapacity = $carryingCapacity;

        return $this;
    }
}
