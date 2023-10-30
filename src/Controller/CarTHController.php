<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarTHRepository;
use App\Repository\CarPriceRepository;

class CarTHController extends AbstractController
{

    /**
     * @Route("/get/car/{id}/{data}", name="get_car_by_id", methods={"GET"})
     */
    public function getById(CarTHRepository $carRepo, $id = "all", $data = "all"): JsonResponse
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
}
