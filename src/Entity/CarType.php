<?php

namespace App\Entity;

use App\Repository\CarTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarTypeRepository::class)
 */
class CarType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity=CarTH::class, mappedBy="carTypeId")
     */
    private $carTHs;

    public function __construct()
    {
        $this->carTHs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, CarTH>
     */
    public function getCarTHs(): Collection
    {
        return $this->carTHs;
    }

    public function addCarTH(CarTH $carTH): self
    {
        if (!$this->carTHs->contains($carTH)) {
            $this->carTHs[] = $carTH;
            $carTH->setCarType($this);
        }

        return $this;
    }

    public function removeCarTH(CarTH $carTH): self
    {
        if ($this->carTHs->removeElement($carTH)) {
            // set the owning side to null (unless already changed)
            if ($carTH->getCarType() === $this) {
                $carTH->setCarType(null);
            }
        }

        return $this;
    }
}
