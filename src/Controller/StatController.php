<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarTHRepository;
use App\Repository\BrandRepository;
use App\Repository\CarTypeRepository;

class StatController extends AbstractController
{
    /**
     * @Route("/get/stats", name="get_stats", methods={"GET"})
     */
    public function getStats(CarTHRepository $carRepo, BrandRepository $brandRepo, CarTypeRepository $carTypeRepo): JsonResponse
    {
        $cars = $carRepo->findAll();
        $brands = $brandRepo->findAll();
        $types = $carTypeRepo->findAll();

        if ($cars == null || $brands == null || $types == null) {
            return $this->json([
                'response' => 'notFound'
            ]);
        }       

        return new JsonResponse([
            'response' => 'ok',
            'result' => [
                'cars' => count($cars),
                'brands' => count($brands),
                'types' => count($types)
            ]
        ]);
    }
    /**
     * @Route("/get/data/max", name="get_data_max", methods={"GET"})
     */
    public function getDataMax(CarTHRepository $carRepo ): JsonResponse
    {
        $cars= $carRepo->findAll();

        $minBiofuel = $cars[0]->getBiofuel();
        $maxCityFuel = $cars[0]->getCityFuel();
        $maxCityFuelMetric = $cars[0]->getCityFuelMetric();
        $maxHighwayFuel = $cars[0]->getHighwayFuel();
        $maxHighwayFuelMetric = $cars[0]->getHighwayFuelMetric();
        $maxCombinedFuel = $cars[0]->getCombinedFuel();
        $maxCombinedFuelMetric = $cars[0]->getCombinedFuelMetric();
        $minEcoScore = $cars[0]->getEcoScore();
        $maxAnnualFuelCost = $cars[0]->getAnnualFuelCost();
        $maxAnnualFuelCostEuro = $cars[0]->getAnnualFuelCostEuro();
        $minFeRating = $cars[0]->getFeRating();
        $minGhgRating = $cars[0]->getGhgRating();
        $minSmogRating = $cars[0]->getSmogRating();
        $maxCityCarbon = $cars[0]->getCityCarbon();
        $maxCityCarbonMetric = $cars[0]->getCityCarbonMetric();
        $maxHighwayCarbon = $cars[0]->getHighwayCarbon();
        $maxHighwayCarbonMetric = $cars[0]->getHighwayCarbonMetric();
        $maxCombinedCarbon = $cars[0]->getCombinedCarbon();
        $maxCombinedCarbonMetric = $cars[0]->getCombinedCarbonMetric();

        foreach ($cars as $car){
            if ($car->getMaxBioFuel() < $minBiofuel){
                $minBiofuel = $car->getMaxBioFuel();
            }

            if ($car->getCityFuel() > $maxCityFuel){
                $maxCityFuel = $car->getCityFuel();
                $maxCityFuelMetric = $car->getCityFuelMetric();
            }

            if ($car->getHighwayFuel() > $maxHighwayFuel){
                $maxHighwayFuel = $car->getHighwayFuel();
                $maxHighwayFuelMetric = $car->getHighwayFuelMetric();
            }

            if ($car->getCombinedFuel() > $maxCombinedFuel){
                $maxCombinedFuel = $car->getCombinedFuel();
                $maxCombinedFuelMetric = $car->getCombinedFuelMetric();
            }

            if ($car->getEcoScore() < $minEcoScore){
                $minEcoScore = $car->getEcoScore();
            }

            if ($car->getAnnualFuelCost() > $maxAnnualFuelCost){
                $maxAnnualFuelCost = $car->getAnnualFuelCost();
                $maxAnnualFuelCostEuro = $car->getAnnualFuelCostEuro();
            }

            if ($car->getFeRating() < $minFeRating){
                $minFeRating = $car->getFeRating();
            }

            if ($car->getGhgRating() < $minGhgRating){
                $minGhgRating = $car->getGhgRating();
            }

            if ($car->getSmogRating() < $minSmogRating){
                $minSmogRating = $car->getSmogRating();
            }

            if ($car->getCityCarbon() > $maxCityCarbon){
                $maxCityCarbon = $car->getCityCarbon();
                $maxCityCarbonMetric = $car->getCityCarbonMetric();
            }

            if ($car->getHighwayCarbon() > $maxHighwayCarbon){
                $maxHighwayCarbon = $car->getHighwayCarbon();
                $maxHighwayCarbonMetric = $car->getHighwayCarbonMetric();
            }

            if ($car->getCombinedCarbon() > $maxCombinedCarbon){
                $maxCombinedCarbon = $car->getCombinedCarbon();
                $maxCombinedCarbonMetric = $car->getCombinedCarbonMetric();
            }
        }

        return new JsonResponse([
            'response' => 'ok',
            'result' => [
                'minBiofuel' => $minBiofuel,
                'maxCityFuel' => $maxCityFuel,
                'maxCityFuelMetric' => $maxCityFuelMetric,
                'maxHighwayFuel' => $maxHighwayFuel,
                'maxHighwayFuelMetric' => $maxHighwayFuelMetric,
                'maxCombinedFuel' => $maxCombinedFuel,
                'maxCombinedFuelMetric' => $maxCombinedFuelMetric,
                'minEcoScore' => $minEcoScore,
                'maxAnnualFuelCost' => $maxAnnualFuelCost,
                'maxAnnualFuelCostEuro' => $maxAnnualFuelCostEuro,
                'minFeRating' => $minFeRating,
                'minGhgRating' => $minGhgRating,
                'minSmogRating' => $minSmogRating,
                'maxCityCarbon' => $maxCityCarbon,
                'maxCityCarbonMetric' => $maxCityCarbonMetric,
                'maxHighwayCarbon' => $maxHighwayCarbon,
                'maxHighwayCarbonMetric' => $maxHighwayCarbonMetric,
                'maxCombinedCarbon' => $maxCombinedCarbon,
                'maxCombinedCarbonMetric' => $maxCombinedCarbonMetric
            ]
        ]);
    }
}


