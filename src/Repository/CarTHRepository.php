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
            "maxCityFuelMetric" => $cars[0]->getCityFuelMetric(),
            "minCityFuelMetric" => $cars[0]->getCityFuelMetric(),
        );

        foreach($cars as $car) {
            if ($car->getCityFuelMetric() > $statsGlobal["maxCityFuelMetric"]) {
                $statsGlobal["maxCityFuelMetric"] = $car->getCityFuelMetric();
            }
            if ($car->getCityFuelMetric() < $statsGlobal["minCityFuelMetric"]) {
                $statsGlobal["minCityFuelMetric"] = $car->getCityFuelMetric();
            }
        }

        return $statsGlobal;
    }
}
