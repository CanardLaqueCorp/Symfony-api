<?php

namespace App\Entity;

use App\Repository\FuelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FuelRepository::class)
 */
class Fuel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity=CarTH::class, mappedBy="fuel")
     */
    private $carTHs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $detail;

    public function __construct()
    {
        $this->carTHs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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
            $carTH->setFuel($this);
        }

        return $this;
    }

    public function removeCarTH(CarTH $carTH): self
    {
        if ($this->carTHs->removeElement($carTH)) {
            // set the owning side to null (unless already changed)
            if ($carTH->getFuel() === $this) {
                $carTH->setFuel(null);
            }
        }

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getDataAll() {
        $data = array(
            'id' => $this->getId(),
            'code' => $this->getCode(),
            'label' => $this->getLabel(),
            'detail' => $this->getDetail(),
            'carsNb' => 0
        );

        foreach($this->getCarThs() as $car) {
            $data['carsNb'] += 1;
        }

        return $data;
    }
}
