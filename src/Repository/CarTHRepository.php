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

        $statsGlobal = array(
            "minEcoscore" => $cars[0]->getEcoscore(),
            "maxEcoscore" => $cars[0]->getEcoscore(),
            "minCombinedFuel" => $cars[0]->getCombinedFuel(),
            "maxCombinedFuel" => $cars[0]->getCombinedFuel(),

            // add others min/max here

        );

        foreach($cars as $car) {
            if ($car->getEcoscore() < $statsGlobal["minEcoscore"]) {
                $statsGlobal["minEcoscore"] = $car->getEcoscore();
            }
            if ($car->getEcoscore() > $statsGlobal["maxEcoscore"]) {
                $statsGlobal["maxEcoscore"] = $car->getEcoscore();
            }
            if ($car->getCombinedFuel() < $statsGlobal["minCombinedFuel"]) {
                $statsGlobal["minCombinedFuel"] = $car->getCombinedFuel();
            }
            if ($car->getCombinedFuel() > $statsGlobal["maxCombinedFuel"]) {
                $statsGlobal["maxCombinedFuel"] = $car->getCombinedFuel();
            }

            // add others min/max comparaison here
            
        }

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
