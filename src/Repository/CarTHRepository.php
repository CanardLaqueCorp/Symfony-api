<?php

namespace App\Repository;

use App\Entity\CarTH;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarTH>
 *
 * @method CarTH|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarTH|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarTH[]    findAll()
 * @method CarTH[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarTHRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarTH::class);
    }

    public function getStatsGlobal(): array
    {
        $cars = $this->findAll();

        $prices = array();

        $statsGlobal = array(
            "minEcoscore" => $cars[0]->getEcoscore(),
            "maxEcoscore" => $cars[0]->getEcoscore(),
            "minCityFuel" => $cars[0]->getCityFuel(),
            "maxCityFuel" => $cars[0]->getCityFuel(),
            "minHighwayFuel" => $cars[0]->getHighwayFuel(),
            "maxHighwayFuel" => $cars[0]->getHighwayFuel(),
            "minCombinedFuel" => $cars[0]->getCombinedFuel(),
            "maxCombinedFuel" => $cars[0]->getCombinedFuel(),
            "minCityCarbon" => $cars[0]->getCityCarbon(),
            "maxCityCarbon" => $cars[0]->getCityCarbon(),
            "minHighwayCarbon" => $cars[0]->getHighwayCarbon(),
            "maxHighwayCarbon" => $cars[0]->getHighwayCarbon(),
            "minCombinedCarbon" => $cars[0]->getCombinedCarbon(),
            "maxCombinedCarbon" => $cars[0]->getCombinedCarbon(),
            "minPriceUsed" => 0,
            "maxPriceUsed" => 0,
            "minAnnualFuelCost" => $cars[0]->getAnnualFuelCost(),
            "maxAnnualFuelCost" => $cars[0]->getAnnualFuelCost(),
            "minSpendOnFiveYears" => $cars[0]->getSpendOnFiveYears(),
            "maxSpendOnFiveYears" => $cars[0]->getSpendOnFiveYears(),
            "minFeRating" => $cars[0]->getFeRating(),
            "maxFeRating" => $cars[0]->getFeRating(),
            "minGhgRating" => $cars[0]->getGhgRating(),
            "maxGhgRating" => $cars[0]->getGhgRating(),
            "minSmogRating" => $cars[0]->getSmogRating(),
            "maxSmogRating" => $cars[0]->getSmogRating(),
        );

        foreach($cars as $car) {

            if ($car->getPriceUsed() != null) {
                array_push ($prices, $car->getPriceUsed());
             }

            if ($car->getEcoscore() < $statsGlobal["minEcoscore"]) {
                $statsGlobal["minEcoscore"] = $car->getEcoscore();
            }
            if ($car->getEcoscore() > $statsGlobal["maxEcoscore"]) {
                $statsGlobal["maxEcoscore"] = $car->getEcoscore();
            }

            if ($car->getCityFuel() < $statsGlobal["minCityFuel"]) {
                $statsGlobal["minCityFuel"] = $car->getCityFuel();
            }
            if ($car->getCityFuel() > $statsGlobal["maxCityFuel"]) {
                $statsGlobal["maxCityFuel"] = $car->getCityFuel();
            }

            if ($car->getHighwayFuel() < $statsGlobal["minHighwayFuel"]) {
                $statsGlobal["minHighwayFuel"] = $car->getHighwayFuel();
            }
            if ($car->getHighwayFuel() > $statsGlobal["maxHighwayFuel"]) {
                $statsGlobal["maxHighwayFuel"] = $car->getHighwayFuel();
            }

            if ($car->getCombinedFuel() < $statsGlobal["minCombinedFuel"]) {
                $statsGlobal["minCombinedFuel"] = $car->getCombinedFuel();
            }
            if ($car->getCombinedFuel() > $statsGlobal["maxCombinedFuel"]) {
                $statsGlobal["maxCombinedFuel"] = $car->getCombinedFuel();
            }

            if ($car->getCityCarbon() < $statsGlobal["minCityCarbon"]) {
                $statsGlobal["minCityCarbon"] = $car->getCityCarbon();
            }
            if ($car->getCityCarbon() > $statsGlobal["maxCityCarbon"]) {
                $statsGlobal["maxCityCarbon"] = $car->getCityCarbon();
            }

            if ($car->getHighwayCarbon() < $statsGlobal["minHighwayCarbon"]) {
                $statsGlobal["minHighwayCarbon"] = $car->getHighwayCarbon();
            }
            if ($car->getHighwayCarbon() > $statsGlobal["maxHighwayCarbon"]) {
                $statsGlobal["maxHighwayCarbon"] = $car->getHighwayCarbon();
            }

            if ($car->getCombinedCarbon() < $statsGlobal["minCombinedCarbon"]) {
                $statsGlobal["minCombinedCarbon"] = $car->getCombinedCarbon();
            }
            if ($car->getCombinedCarbon() > $statsGlobal["maxCombinedCarbon"]) {
                $statsGlobal["maxCombinedCarbon"] = $car->getCombinedCarbon();
            }

            if ($car->getAnnualFuelCost() < $statsGlobal["minAnnualFuelCost"]) {
                $statsGlobal["minAnnualFuelCost"] = $car->getAnnualFuelCost();
            }
            if ($car->getAnnualFuelCost() > $statsGlobal["maxAnnualFuelCost"]) {
                $statsGlobal["maxAnnualFuelCost"] = $car->getAnnualFuelCost();
            }

            if ($car->getSpendOnFiveYears() < $statsGlobal["minSpendOnFiveYears"]) {
                $statsGlobal["minSpendOnFiveYears"] = $car->getSpendOnFiveYears();
            }
            if ($car->getSpendOnFiveYears() > $statsGlobal["maxSpendOnFiveYears"]) {
                $statsGlobal["maxSpendOnFiveYears"] = $car->getSpendOnFiveYears();
            }

            if ($car->getFeRating() < $statsGlobal["minFeRating"]) {
                $statsGlobal["minFeRating"] = $car->getFeRating();
            }
            if ($car->getFeRating() > $statsGlobal["maxFeRating"]) {
                $statsGlobal["maxFeRating"] = $car->getFeRating();
            }

            if ($car->getGhgRating() < $statsGlobal["minGhgRating"]) {
                $statsGlobal["minGhgRating"] = $car->getGhgRating();
            }
            if ($car->getGhgRating() > $statsGlobal["maxGhgRating"]) {
                $statsGlobal["maxGhgRating"] = $car->getGhgRating();
            }

            if ($car->getSmogRating() < $statsGlobal["minSmogRating"]) {
                $statsGlobal["minSmogRating"] = $car->getSmogRating();
            }
            if ($car->getSmogRating() > $statsGlobal["maxSmogRating"]) {
                $statsGlobal["maxSmogRating"] = $car->getSmogRating();
            }
        }

        // We remove the 2% min and max prices because they are not representative
        sort($prices);
        $statsGlobal["minPriceUsed"] = $prices[0];
        $statsGlobal["maxPriceUsed"] = $prices[(intval(sizeOf($prices) * 0.95))];

        return $statsGlobal;
    }

    public function searchCar($fuelType, $brand, $carType, $hasStartAndStop, $gears, $transmissionType, $driveSystem, $cylinder, $minPrice, $maxPrice) {
        $r = $this->createQueryBuilder('carTH');
        // if ($fuelType != null) {
        //     $r->andWhere('carTH.carFuel = :fuelType')
        //     ->setParameter('fuelType', $fuelType);
        // }
        if ($brand != null) {
            $r->andWhere('carTH.carBrand = :brand')
            ->setParameter('brand', $brand);
        }
        if ($carType != null) {
            $r->andWhere('carTH.carLineType = :carType')
            ->setParameter('carType', $carType);
        }
        if ($hasStartAndStop != null) {
            $r->andWhere('carTH.hasStartAndStop = :hasStartAndStop')
            ->setParameter('hasStartAndStop', $hasStartAndStop);
        }
        if ($gears != null) {
            $r->andWhere('carTH.gears = :gears')
            ->setParameter('gears', $gears);
        }
        if ($transmissionType != null) {
            $r->andWhere('carTH.carTransmissionType = :transmission')
            ->setParameter('transmission', $transmissionType);
        }
        if ($driveSystem != null) {
            $r->andWhere('carTH.carDriveSystem = :driveSystem')
            ->setParameter('driveSystem', $driveSystem);
        }
        if ($cylinder != null) {
            $r->andWhere('carTH.cylinder = :cylinder')
            ->setParameter('cylinder', $cylinder);
        }
        if ($minPrice != null) {
            $r->andWhere('carTH.priceUsedEuro >= :minPrice')
            ->setParameter('minPrice', $minPrice);
        }
        if ($maxPrice != null) {
            $r->andWhere('carTH.priceUsedEuro <= :maxPrice')
            ->setParameter('maxPrice', $maxPrice);
        }
        $r->orderBy('carTH.ecoScore', 'DESC');
        $r->AddOrderBy('carTH.priceUsed', 'ASC');
        $query = $r->getQuery();
        return $query->getResult();
    }
}
