<?php

namespace App\Entity;

use App\Repository\CarPriceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarPriceRepository::class)
 */
class CarPrice
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=CarTH::class, inversedBy="carPrices")
     */
    private $car;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $mileage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $year;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCar(): ?CarTH
    {
        return $this->car;
    }

    public function setRelation(?CarTH $car): self
    {
        $this->car = $car;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getDataAll() {
        return [
            'id' => $this->getId(),
            'price' => $this->getPrice(),
            'mileage' => $this->getMileage(),
            'year' => $this->getYear()
        ];
    }
}
