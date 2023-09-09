<?php

namespace App\Entity;

use App\Repository\CarTHRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarTHRepository::class)
 */
class CarTH
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
    private $brand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="smallint")
     */
    private $cylinder;

    /**
     * @ORM\ManyToOne(targetEntity=Transmission::class, inversedBy="carTHs")
     */
    private $carTransmissionType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $carTransmission;

    /**
     * @ORM\Column(type="float")
     */
    private $cityFuel;

    /**
     * @ORM\Column(type="float")
     */
    private $highwayFuel;

    /**
     * @ORM\Column(type="float")
     */
    private $combinedFuel;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasGuzzler;

    /**
     * @ORM\Column(type="integer")
     */
    private $gears;

    /**
     * @ORM\ManyToOne(targetEntity=DriveSystem::class, inversedBy="carTHs")
     */
    private $carDriveSystem;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxBioFuel;

    /**
     * @ORM\ManyToOne(targetEntity=Fuel::class, inversedBy="carTHs")
     */
    private $carFuel;

    /**
     * @ORM\Column(type="integer")
     */
    private $annualFuelCost;

    /**
     * @ORM\Column(type="integer")
     */
    private $spendOnFiveYears;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasStartAndStop;

    /**
     * @ORM\Column(type="smallint")
     */
    private $feRating;

    /**
     * @ORM\Column(type="smallint")
     */
    private $ghgRating;

    /**
     * @ORM\Column(type="smallint")
     */
    private $smogRating;

    /**
     * @ORM\Column(type="float")
     */
    private $cityCarbon;

    /**
     * @ORM\Column(type="float")
     */
    private $highwayCarbon;

    /**
     * @ORM\Column(type="float")
     */
    private $combinedCarbon;

    /**
     * @ORM\ManyToOne(targetEntity=CarType::class, inversedBy="carTHs")
     */
    private $carLineType;

    /**
     * @ORM\Column(type="integer")
     */
    private $priceNew;

    /**
     * @ORM\Column(type="integer")
     */
    private $priceUsed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
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

    public function getCylinder(): ?int
    {
        return $this->cylinder;
    }

    public function setCylinder(int $cylinder): self
    {
        $this->cylinder = $cylinder;

        return $this;
    }

    public function getTransmissionType(): ? Transmission
    {
        return $this->carTransmissionType;
    }

    public function setTransmissionType(?Transmission $carTransmissionType): self
    {
        $this->carTransmissionType = $carTransmissionType;

        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->carTransmission;
    }

    public function setTransmission(?string $carTransmission): self
    {
        $this->carTransmission = $carTransmission;

        return $this;
    }

    public function getCityFuel(): ?float
    {
        return $this->cityFuel;
    }

    public function setCityFuel(float $cityFuel): self
    {
        $this->cityFuel = $cityFuel;

        return $this;
    }

    public function getHighwayFuel(): ?float
    {
        return $this->highwayFuel;
    }

    public function setHighwayFuel(float $highwayFuel): self
    {
        $this->highwayFuel = $highwayFuel;

        return $this;
    }

    public function getCombinedFuel(): ?float
    {
        return $this->combinedFuel;
    }

    public function setCombinedFuel(float $combinedFuel): self
    {
        $this->combinedFuel = $combinedFuel;

        return $this;
    }

    public function hasGuzzler(): ?bool
    {
        return $this->hasGuzzler;
    }

    public function setGuzzler(?bool $hasGuzzler): self
    {
        $this->hasGuzzler = $hasGuzzler;

        return $this;
    }

    public function getGears(): ?int
    {
        return $this->gears;
    }

    public function setGears(int $gears): self
    {
        $this->gears = $gears;

        return $this;
    }

    public function getDriveSystem(): ?DriveSystem
    {
        return $this->carDriveSystem;
    }

    public function setDriveSystem(?DriveSystem $carDriveSystem): self
    {
        $this->carDriveSystem = $carDriveSystem;

        return $this;
    }

    public function getMaxBioFuel(): ?int
    {
        return $this->maxBioFuel;
    }

    public function setMaxBioFuel(?int $maxBioFuel): self
    {
        $this->maxBioFuel = $maxBioFuel;

        return $this;
    }

    public function getFuel(): ?Fuel
    {
        return $this->carFuel;
    }

    public function setFuel(?Fuel $carFuel): self
    {
        $this->carFuel = $carFuel;

        return $this;
    }

    public function getAnnualFuelCost(): ?int
    {
        return $this->annualFuelCost;
    }

    public function setAnnualFuelCost(int $annualFuelCost): self
    {
        $this->annualFuelCost = $annualFuelCost;

        return $this;
    }

    public function getSpendOnFiveYears(): ?int
    {
        return $this->spendOnFiveYears;
    }

    public function setSpendOnFiveYears(int $spendOnFiveYears): self
    {
        $this->spendOnFiveYears = $spendOnFiveYears;

        return $this;
    }

    public function hasStartAndStop(): ?bool
    {
        return $this->hasStartAndStop;
    }

    public function setStartAndStop(bool $hasStartAndStop): self
    {
        $this->hasStartAndStop = $hasStartAndStop;

        return $this;
    }

    public function getFeRating(): ?int
    {
        return $this->feRating;
    }

    public function setFeRating(int $feRating): self
    {
        $this->feRating = $feRating;

        return $this;
    }

    public function getGhgRating(): ?int
    {
        return $this->ghgRating;
    }

    public function setGhgRating(int $ghgRating): self
    {
        $this->ghgRating = $ghgRating;

        return $this;
    }

    public function getSmogRating(): ?int
    {
        return $this->smogRating;
    }

    public function setSmogRating(int $smogRating): self
    {
        $this->smogRating = $smogRating;

        return $this;
    }

    public function getCityCarbon(): ?float
    {
        return $this->cityCarbon;
    }

    public function setCityCarbon(float $cityCarbon): self
    {
        $this->cityCarbon = $cityCarbon;

        return $this;
    }

    public function getHighwayCarbon(): ?float
    {
        return $this->highwayCarbon;
    }

    public function setHighwayCarbon(float $highwayCarbon): self
    {
        $this->highwayCarbon = $highwayCarbon;

        return $this;
    }

    public function getCombinedCarbon(): ?float
    {
        return $this->combinedCarbon;
    }

    public function setCombinedCarbon(float $combinedCarbon): self
    {
        $this->combinedCarbon = $combinedCarbon;

        return $this;
    }

    public function getCarType(): ?CarType
    {
        return $this->carLineType;
    }

    public function setCarType(?CarType $carLineType): self
    {
        $this->carLineType = $carLineType;

        return $this;
    }

    public function getPriceNew(): ?int
    {
        return $this->priceNew;
    }

    public function setPriceNew(int $priceNew): self
    {
        $this->priceNew = $priceNew;

        return $this;
    }

    public function getPriceUsed(): ?int
    {
        return $this->priceUsed;
    }

    public function setPriceUsed(int $priceUsed): self
    {
        $this->priceUsed = $priceUsed;

        return $this;
    }

    public function getDataAll() {
        return array(
            'id' => $this->getId(),
            'brand' => $this->getBrand(),
            'model' => $this->getModel(),
            // 'carTypeId' => $this->getCarType(),
            'priceNew' => $this->getPriceNew(),
            'priceUsed' => $this->getPriceUsed(),
            'cylinder' => $this->getCylinder(),
            // 'transmissionType' => $this->getTransmissionType(),
            'transmission' => $this->getTransmission(),
            'gears' => $this->getGears(),
            // 'driveSystem' => $this->getDriveSystem(),
            // 'fuel' => $this->getFuel(),
            'maxBioFuel' => $this->getMaxBioFuel(),
            'hasStartAndStop' => $this->hasStartAndStop(),
            'cityFuel' => $this->getCityFuel(),
            'cityCarbon' => $this->getCityCarbon(),
            'highwayFuel' => $this->getHighwayFuel(),
            'highwayCarbon' => $this->getHighwayCarbon(),
            'combinedFuel' => $this->getCombinedFuel(),
            'combinedCarbon' => $this->getCombinedCarbon(),
            'hasGuzzler' => $this->hasGuzzler(),
            'annualFuelCost' => $this->getAnnualFuelCost(),
            'spendOnFiveYears' => $this->getSpendOnFiveYears(),
            'feRating' => $this->getFeRating(),
            'ghgRating' => $this->getGhgRating(),
            'smogRating' => $this->getSmogRating()
        );
    }
}
