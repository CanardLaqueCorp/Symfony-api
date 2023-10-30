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
}
