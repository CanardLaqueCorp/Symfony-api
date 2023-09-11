<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BrandRepository::class)
 */
class Brand
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
     * @ORM\OneToMany(targetEntity=CarTh::class, mappedBy="carBrand")
     */
    private $carThs;

    public function __construct()
    {
        $this->carThs = new ArrayCollection();
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
     * @return Collection<int, CarTh>
     */
    public function getCarThs(): Collection
    {
        return $this->carThs;
    }

    public function addCarTh(CarTh $carTh): self
    {
        if (!$this->carThs->contains($carTh)) {
            $this->carThs[] = $carTh;
            $carTh->setCarBrand($this);
        }

        return $this;
    }

    public function removeCarTh(CarTh $carTh): self
    {
        if ($this->carThs->removeElement($carTh)) {
            // set the owning side to null (unless already changed)
            if ($carTh->getCarBrand() === $this) {
                $carTh->setCarBrand(null);
            }
        }

        return $this;
    }

    public function getDataAll() {
        $data = array(
            'id' => $this->getId(),
            'label' => $this->getLabel(),
            'carsNb' => 0
        );

        foreach($this->getCarThs() as $car) {
            $data['carsNb'] += 1;
        }

        return $data;
    }
}
