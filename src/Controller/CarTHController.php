<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarTHRepository;

class CarTHController extends AbstractController
{

    /**
     * @Route("/car/th/{id}", name="get_car_th_by_id", methods={"GET"})
     */
    public function getById(CarTHRepository $carRepo, $id = null): JsonResponse
    {
        // Si l'id n'est pas spécifié on renvoie toutes les voitures thermiques
        if ($id == null) {
            $cars = $carRepo->findAll();

            if ($cars != null) {
                $carsRes = array();
                foreach ($cars as $car) {
                    $carsRes[] = $car->getDataAll();
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
        // Sinon on renvoie la voiture correspondant à l'id
        else {

            $car = $carRepo->find($id);
            
            if($car == null) {
                return $this->json([
                    'response' => 'notFound'
                ]);
            }
            
            return $this->json([
                'response' => 'ok',
                'result' => $car->getDataAll()
            ]);
        }
    }
}
