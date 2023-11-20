<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarTHRepository;
use App\Repository\CarPriceRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class CarTHController extends AbstractController
{

    /**
     * @Route("/get/car/{id}/{data}", name="get_car_by_id", methods={"GET"})
     */
    public function getById(EntityManagerInterface $entityManager,CarTHRepository $carRepo, $id = "all", $data = "all"): JsonResponse
    {
        $statsGlobal = $carRepo->getStatsGlobal();

        if ($id == "all") {
            $cars = $carRepo->findBy([], ['ecoScore' => 'DESC']);

            if ($cars != null) {
                $carsRes = array();
                foreach ($cars as $car) {
                    if($data == 'light') {
                        $carsRes[] = $car->getDataLight($statsGlobal);
                    } else {
                        $carsRes[] = $car->getDataAll($statsGlobal);
                    }
                }

                return new JsonResponse([
                    'response' => 'ok',
                    'result' => $carsRes
                ], 200);
            }
            else {
                return new JsonResponse(['response' => 'Not found'], 404);
            }            
        }
        else {

            $car = $carRepo->find($id);
            
            if($car == null) {
                return new JsonResponse(['response' => 'Not found'], 404);
            }

            $car->setViews($car->getViews() + 1);
            $entityManager->persist($car);
            $entityManager->flush();

            if($data == 'light') {
                $data = $car->getDataLight($statsGlobal);
            } else {
                $data = $car->getDataAll($statsGlobal);
            }
            
            return new JsonResponse([
                'response' => 'ok',
                'result' => $data
            ], 200);
        }
    }

    /**
     * @Route("/get/prices/{id}", name="get_prices_by_car_id", methods={"GET"})
     */
    public function getPricesById(CarTHRepository $carRepo, $id = null) {
        if ($id == null)
        {
            return new JsonResponse(['response' => 'Not found'], 404);
        }
        else {
            $prices = $carRepo->find($id)->getCarPrices();
            $res = array();
            foreach ($prices as $price) {
                $res[] = $price->getDataAll();
            }
            return new JsonResponse([
                'response' => 'ok',
                'result' => $res
            ], 200);
        }
    }

     /**
     * @Route("/search/car/{data}", name="search_car", methods={"GET"})
     */
    public function searchCar(Request $request, CarTHRepository $carRepo, $data = "all") {
        $dataGet = $request->query->all();
        $fuelType = isset($dataGet['fuel']) ? $dataGet['fuel'] : null;
        $brand = isset($dataGet['brand']) ? $dataGet['brand'] : null;
        $carType = isset($dataGet['cartype']) ? $dataGet['cartype'] : null;
        $hasStartAndStop = isset($dataGet['startandstop']) ? $dataGet['startandstop'] : null;
        $gears = isset($dataGet['gears']) ? $dataGet['gears'] : null;
        $transmissionType = isset($dataGet['transmission']) ? $dataGet['transmission'] : null;
        $driveSystem = isset($dataGet['drivesystem']) ? $dataGet['drivesystem'] : null; 
        $cylinder = isset($dataGet['cylinder']) ? $dataGet['cylinder'] : null;
        $minPrice = isset($dataGet['minPrice']) ? $dataGet['minPrice'] : null;
        $maxPrice = isset($dataGet['maxPrice']) ? $dataGet['maxPrice'] : null;

        $cars = $carRepo->searchCar($fuelType, $brand, $carType, $hasStartAndStop, $gears, $transmissionType, $driveSystem, $cylinder, $minPrice, $maxPrice);

        if ($cars == null) {
            return new JsonResponse(['response' => 'Not found'], 404);
        }
        else {
            if (sizeOf($cars) == 0) {
                return new JsonResponse(['response' => 'Not found'], 404);
            } else {

                $statsGlobal = $carRepo->getStatsGlobal();
                $carsRes = array();
                foreach ($cars as $car) {

                    if($data == 'light') {
                        $carsRes[] = $car->getDataLight($statsGlobal);
                    } else {
                        $carsRes[] = $car->getDataAll($statsGlobal);
                    }
                }
                return new JsonResponse([
                    'response' => 'ok',
                    'result' => $carsRes
                ], 200);
            }
        }
    }
}
