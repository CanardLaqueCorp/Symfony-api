<?php

namespace App\Entity;

use App\Repository\CarTHRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ecoScore;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="carThs")
     */
    private $carBrand;

    /**
     * @ORM\OneToMany(targetEntity=CarPrice::class, mappedBy="car")
     */
    private $carPrices;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $priceUsedEuro;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $annualFuelCostEuro;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $spendOnFiveYearsEuro;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $cityFuelMetric;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $highwayFuelMetric;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $combinedFuelMetric;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cityCarbonMetric;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $highwayCarbonMetric;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $combinedCarbonMetric;

    /**
     * @ORM\Column(type="integer")
     */
    private $views;

    public function __construct()
    {
        $this->carPrices = new ArrayCollection();
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
        return $this->priceNew == 0 ? null : $this->priceNew;
    }

    public function setPriceNew(int $priceNew): self
    {
        $this->priceNew = $priceNew;

        return $this;
    }

    public function getPriceUsed(): ?int
    {
        return ($this->priceUsed == 0) ? null : $this->priceUsed;
    }

    public function setPriceUsed(int $priceUsed): self
    {
        $this->priceUsed = $priceUsed;

        return $this;
    }

    public function getEcoScore(): ?int
    {
        return $this->ecoScore;
    }

    public function setEcoScore(?int $ecoScore): self
    {
        $this->ecoScore = $ecoScore;

        return $this;
    }

    public function getCarBrand(): ?Brand
    {
        return $this->carBrand;
    }

    public function setCarBrand(?Brand $carBrand): self
    {
        $this->carBrand = $carBrand;

        return $this;
    }

    /**
     * @return Collection<int, CarPrice>
     */
    public function getCarPrices(): Collection
    {
        return $this->carPrices;
    }

    public function addCarPrice(CarPrice $carPrice): self
    {
        if (!$this->carPrices->contains($carPrice)) {
            $this->carPrices[] = $carPrice;
            $carPrice->setRelation($this);
        }

        return $this;
    }

    public function removeCarPrice(CarPrice $carPrice): self
    {
        if ($this->carPrices->removeElement($carPrice)) {
            // set the owning side to null (unless already changed)
            if ($carPrice->getCar() === $this) {
                $carPrice->setRelation(null);
            }
        }

        return $this;
    }

    public function getPriceUsedEuro(): ?int
    {
        return $this->priceUsedEuro;
    }

    public function setPriceUsedEuro(?int $priceUsedEuro): self
    {
        $this->priceUsedEuro = $priceUsedEuro;

        return $this;
    }

    public function getAnnualFuelCostEuro(): ?int
    {
        return $this->annualFuelCostEuro;
    }

    public function setAnnualFuelCostEuro(?int $annualFuelCostEuro): self
    {
        $this->annualFuelCostEuro = $annualFuelCostEuro;

        return $this;
    }

    public function getSpendOnFiveYearsEuro(): ?int
    {
        return $this->spendOnFiveYearsEuro;
    }

    public function setspendOnFiveYearsEuro(?int $spendOnFiveYearsEuro): self
    {
        $this->spendOnFiveYearsEuro = $spendOnFiveYearsEuro;

        return $this;
    }

    public function getCityFuelMetric(): ?float
    {
        return $this->cityFuelMetric;
    }

    public function setCityFuelMetric(?float $cityFuelMetric): self
    {
        $this->cityFuelMetric = $cityFuelMetric;

        return $this;
    }

    public function getHighwayFuelMetric(): ?float
    {
        return $this->highwayFuelMetric;
    }

    public function setHighwayFuelMetric(?float $highwayFuelMetric): self
    {
        $this->highwayFuelMetric = $highwayFuelMetric;

        return $this;
    }

    public function getCombinedFuelMetric(): ?float
    {
        return $this->combinedFuelMetric;
    }

    public function setCombinedFuelMetric(?float $combinedFuelMetric): self
    {
        $this->combinedFuelMetric = $combinedFuelMetric;

        return $this;
    }

    public function getCityCarbonMetric(): ?int
    {
        return $this->cityCarbonMetric;
    }

    public function setCityCarbonMetric(?int $cityCarbonMetric): self
    {
        $this->cityCarbonMetric = $cityCarbonMetric;

        return $this;
    }

    public function getHighwayCarbonMetric(): ?int
    {
        return $this->highwayCarbonMetric;
    }

    public function setHighwayCarbonMetric(?int $highwayCarbonMetric): self
    {
        $this->highwayCarbonMetric = $highwayCarbonMetric;

        return $this;
    }

    public function getCombinedCarbonMetric(): ?int
    {
        return $this->combinedCarbonMetric;
    }

    public function setCombinedCarbonMetric(?int $combinedCarbonMetric): self
    {
        $this->combinedCarbonMetric = $combinedCarbonMetric;

        return $this;
    }

    // Returns the position of a value (in %) between a min and a max
    private function adjust($value, $min, $max) {
        return intval(100 * ($value - $min) / ($max - $min));
    }

    // Returns the grade of a value between a min and a max (the higher the value, the higher the grade)
    private function calculateGrade($value, $min, $max) {
        if($value == null) {
            return null;
        }
        $value = $this->adjust($value, $min, $max);
        if ($value >= 80) {
            $grade = 5;
        } else if ($value >= 60) {
            $grade = 4;
        } else if ($value >= 40) {
            $grade = 3;
        } else if ($value >= 20) {
            $grade = 2;
        } else {
            $grade = 1;
        }
        return $grade;
    }

    // Returns the grade of a value between a min and a max (the higher the value, the lower the grade)
    private function calculateGradeReverse($value, $min, $max) {
        if($value == null) {
            return null;
        }
       return 6 - $this->calculateGrade($value, $min, $max);
    }
    
    public function getDataAll($stats) {
        $grades = array(
            'priceUsedGrade' => $this->calculateGradeReverse($this->getPriceUsed(), $stats["minPriceUsed"], $stats["maxPriceUsed"]),
            'cityFuelGrade' => $this->calculateGrade($this->getCityFuel(), $stats["minCityFuel"], $stats["maxCityFuel"]),
            'cityCarbonGrade' => $this->calculateGradeReverse($this->getCityCarbon(), $stats["minCityCarbon"], $stats["maxCityCarbon"]),
            'highwayFuelGrade' => $this->calculateGrade($this->getHighwayFuel(), $stats["minHighwayFuel"], $stats["maxHighwayFuel"]),
            'highwayCarbonGrade' => $this->calculateGradeReverse($this->getHighwayCarbon(), $stats["minHighwayCarbon"], $stats["maxHighwayCarbon"]),
            'combinedFuelGrade' => $this->calculateGrade($this->getCombinedFuel(), $stats["minCombinedFuel"], $stats["maxCombinedFuel"]),
            'combinedCarbonGrade' => $this->calculateGradeReverse($this->getCombinedCarbon(), $stats["minCombinedCarbon"], $stats["maxCombinedCarbon"]),
            'annualFuelCostGrade' => $this->calculateGradeReverse($this->getAnnualFuelCost(), $stats["minAnnualFuelCost"], $stats["maxAnnualFuelCost"]),
            'spendOnFiveYearsGrade' => $this->calculateGradeReverse($this->getSpendOnFiveYears(), $stats["minSpendOnFiveYears"], $stats["maxSpendOnFiveYears"]),
            'feRatingGrade' => $this->calculateGrade($this->getFeRating(), $stats["minFeRating"], $stats["maxFeRating"]),
            'ghgRatingGrade' => $this->calculateGrade($this->getGhgRating(), $stats["minGhgRating"], $stats["maxGhgRating"]),
            'smogRatingGrade' => $this->calculateGrade($this->getSmogRating(), $stats["minSmogRating"], $stats["maxSmogRating"]),
            'bioFuelGrade' => $this->calculateGrade($this->getMaxBioFuel(), $stats["minBiofuel"], $stats["maxBiofuel"]),
        );

        $graphs = array(
            'cityFuelGraph' => $this->adjust($this->getCityFuel(), $stats["minCityFuel"], $stats["maxCityFuel"]),
            'cityCarbonGraph' => 100 - $this->adjust($this->getCityCarbon(), $stats["minCityCarbon"], $stats["maxCityCarbon"]),
            'highwayFuelGraph' => $this->adjust($this->getHighwayFuel(), $stats["minHighwayFuel"], $stats["maxHighwayFuel"]),
            'highwayCarbonGraph' => 100 - $this->adjust($this->getHighwayCarbon(), $stats["minHighwayCarbon"], $stats["maxHighwayCarbon"]),
            'combinedFuelGraph' => $this->adjust($this->getCombinedFuel(), $stats["minCombinedFuel"], $stats["maxCombinedFuel"]),
            'combinedCarbonGraph' => 100 - $this->adjust($this->getCombinedCarbon(), $stats["minCombinedCarbon"], $stats["maxCombinedCarbon"]),
            'feRatingGraph' => $this->adjust($this->getFeRating(), $stats["minFeRating"], $stats["maxFeRating"]),
            'ghgRatingGraph' => $this->adjust($this->getGhgRating(), $stats["minGhgRating"], $stats["maxGhgRating"]),
            'smogRatingGraph' => $this->adjust($this->getSmogRating(), $stats["minSmogRating"], $stats["maxSmogRating"]),
            'ecoScoreGraph' => $this->getEcoScore(),
            'bioFuelGraph' => $this->adjust($this->getMaxBioFuel(), $stats["minBiofuel"], $stats["maxBiofuel"]),
        );

        return array(
            'id' => $this->getId(),
            'brandId' => $this->getCarBrand()->getId(),
            'brand' => $this->getCarBrand()->getLabel(),
            'model' => $this->getModel(),
            'carTypeId' => $this->getCarType()->getId(),
            'carType' => $this->getCarType()->getLabel(),
            'priceNew' => $this->getPriceNew(),
            'priceUsed' => $this->getPriceUsed(),
            'priceUsedEuro' => $this->getPriceUsedEuro(),
            'cylinder' => $this->getCylinder(),
            'transmissionTypeId' => $this->getTransmissionType()->getId(),
            'transmissionTypeCode' => $this->getTransmissionType()->getCode(),
            'transmissionType' => $this->getTransmissionType()->getLabel(),
            'transmission' => $this->getTransmission(),
            'gears' => $this->getGears(),
            'driveSystemId' => $this->getDriveSystem()->getId(),
            'driveSystemCode' => $this->getDriveSystem()->getCode(),
            'driveSystem' => $this->getDriveSystem()->getLabel(),
            'fuelId' => $this->getFuel()->getId(),
            'fuelCode' => $this->getFuel()->getCode(),
            'fuel' => $this->getFuel()->getLabel(),
            'fuelDetail' => $this->getFuel()->getDetail(),
            'maxBioFuel' => $this->getMaxBioFuel(),
            'hasStartAndStop' => $this->hasStartAndStop(),
            'cityFuel' => $this->getCityFuel(),
            'cityFuelMetric' => $this->getCityFuelMetric(),   
            'cityCarbon' => $this->getCityCarbon(),
            'cityCarbonMetric' => $this->getCityCarbonMetric(),
            'highwayFuel' => $this->getHighwayFuel(),
            'highwayFuelMetric' => $this->getHighwayFuelMetric(),
            'highwayCarbon' => $this->getHighwayCarbon(),
            'highwayCarbonMetric' => $this->getHighwayCarbonMetric(),
            'combinedFuel' => $this->getCombinedFuel(),
            'combinedFuelMetric' => $this->getCombinedFuelMetric(),
            'combinedCarbon' => $this->getCombinedCarbon(),
            'combinedCarbonMetric' => $this->getCombinedCarbonMetric(),
            'hasGuzzler' => $this->hasGuzzler(),
            'annualFuelCost' => $this->getAnnualFuelCost(),
            'annualFuelCostEuro' => $this->getAnnualFuelCostEuro(),
            'spendOnFiveYears' => $this->getSpendOnFiveYears(),
            'spendOnFiveYearsEuro' => $this->getSpendOnFiveYearsEuro(),
            'feRating' => $this->getFeRating(),
            'ghgRating' => $this->getGhgRating(),
            'smogRating' => $this->getSmogRating(),
            'views' => $this->getViews(),
            'ecoScore' => $this->adjust($this->getEcoScore(), $stats["minEcoscore"], $stats["maxEcoscore"]),
            'ecoScoreNonAdjusted' => $this->getEcoScore(),
            'grades' => $grades,
            'graphs' => $graphs
        );
    }

    public function getDataLight($stats) {
        return array(
            'id' => $this->getId(),
            'brand' => $this->getCarBrand()->getLabel(),
            'model' => $this->getModel(),
            'usedPrice' => $this->getPriceUsed(),
            'usedPriceEuro' => $this->getPriceUsedEuro(),
            'carType' => $this->getCarType()->getLabel(),
            'fuel' => $this->getFuel()->getLabel(),
            'annualFuelCost' => $this->getAnnualFuelCost(),
            'annualFuelCostEuro' => $this->getAnnualFuelCostEuro(),
            'ecoScore' => $this->adjust($this->getEcoScore(), $stats["minEcoscore"], $stats["maxEcoscore"]),
            'ecoScoreNonAdjusted' => $this->getEcoScore(),
            'views' => $this->getViews()
        );
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(int $views): self
    {
        $this->views = $views;

        return $this;
    }
}
