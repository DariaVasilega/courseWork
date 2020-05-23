<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EgineRepository")
 */
class Engine
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
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $workPrincipe;

    /**
     * @ORM\Column(type="integer")
     */
    private $power;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\BaseEntityTransport", mappedBy="engineType")
     */
    private $baseEntityTransports;

    public function __construct()
    {
        $this->baseEntityTransports = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getWorkPrincipe(): ?string
    {
        return $this->workPrincipe;
    }

    public function setWorkPrincipe(string $workPrincipe): self
    {
        $this->workPrincipe = $workPrincipe;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(int $power): self
    {
        $this->power = $power;

        return $this;
    }

    /**
     * @return Collection|BaseEntityTransport[]
     */
    public function getBaseEntityTransports(): Collection
    {
        return $this->baseEntityTransports;
    }

    public function addBaseEntityTransport(BaseEntityTransport $baseEntityTransport): self
    {
        if (!$this->baseEntityTransports->contains($baseEntityTransport)) {
            $this->baseEntityTransports[] = $baseEntityTransport;
            $baseEntityTransport->addEngineType($this);
        }

        return $this;
    }

    public function removeBaseEntityTransport(BaseEntityTransport $baseEntityTransport): self
    {
        if ($this->baseEntityTransports->contains($baseEntityTransport)) {
            $this->baseEntityTransports->removeElement($baseEntityTransport);
            $baseEntityTransport->removeEngineType($this);
        }

        return $this;
    }
}
