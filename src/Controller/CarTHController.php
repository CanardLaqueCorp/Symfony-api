<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\CarTH;
use App\Repository\CarTHRepository;

class CarTHController extends AbstractController
{
    /**
     * @Route("/car/th/{id}", name="get_car_th")
     */
    public function getById(CarTHRepository $carTHRepo, $id = null): JsonResponse
    {
        // Si l'id n'est pas spécifié on renvoie toutes les voitures thermiques
        if ($id == null) {
            // $cars = $carTHRepo->findAll();

            return $this->json([
                'response' => 'notFound'
            ]);
        }
        // Sinon on recherche la voiture correspondant à l'id
        else {

            $car = $carTHRepo->findOneById($id);
            
            if($car == null) {
                return $this->json([
                    'response' => 'notFound'
                ]);
            }
            
            return $this->json([
                'response' => 'ok',
                'id' => $car->getId(),
                'brand' => $car->getBrand(),
                'model' => $car->getModel(),
            ]);
        }
    }
}
