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
     * @Route("/car/th/{id}", name="get_car_by_id")
     */
    public function getById(CarTHREpository $carTHRepo, $id = null): JsonResponse
    {
        $car = $carTHRepo -> findOneById($id);

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
