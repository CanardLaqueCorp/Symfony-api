<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarTHRepository;

class CarTHController extends AbstractController
{

    /**
     * @Route("/get/car/th/{id}/{data}", name="get_car_th_by_id", methods={"GET"})
     */
    public function getById(CarTHRepository $carRepo, $id = "all", $data = "all"): JsonResponse
    {
        if ($id == "all") {
            $cars = $carRepo->findBy([], ['ecoScore' => 'DESC']);

            if ($cars != null) {
                $carsRes = array();
                foreach ($cars as $car) {
                    if($data == 'light') {
                        $carsRes[] = $car->getDataLight();
                    } else {
                        $carsRes[] = $car->getDataAll();
                    }
                }
                return $this->json([
                    'response' => 'ok',
                    'result' => $carsRes
                ]);
            }
            else {
                return $this->json([
                    'response' => 'notFound'
                ]);
            }            
        }
        else {

            $car = $carRepo->find($id);
            
            if($car == null) {
                return $this->json([
                    'response' => 'notFound'
                ]);
            }

            if($data == 'light') {
                $data = $car->getDataLight();
            } else {
                $data = $car->getDataAll();
            }
            
            return $this->json([
                'response' => 'ok',
                'result' => $data
            ]);
        }
    }
}
