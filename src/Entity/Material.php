<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaterialRepository")
 */
class Material
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
     * @ORM\ManyToMany(targetEntity="App\Entity\BaseEntityTransport", mappedBy="material")
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
            $baseEntityTransport->addMaterial($this);
        }

        return $this;
    }

    public function removeBaseEntityTransport(BaseEntityTransport $baseEntityTransport): self
    {
        if ($this->baseEntityTransports->contains($baseEntityTransport)) {
            $this->baseEntityTransports->removeElement($baseEntityTransport);
            $baseEntityTransport->removeMaterial($this);
        }

        return $this;
    }
}
