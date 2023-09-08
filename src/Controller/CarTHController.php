<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\CarTH;
use App\Repository\CarTHRepository;

class CarTHController extends AbstractController
{
    /**
     * @Route("/car/th", name="app_car_th")
     */
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CarTHController.php',
        ]);
    }

    public function getById($id = 1): JsonResponse
    {
        // $carTH = $this->getDoctrine()->getRepository(CarTH::class)->findOneById($id);

        return $this->json([
            'id' => $id,
            // 'brand' => $carTH->getBrand(),
            // 'model' => $carTH->getModel(),
        ]);
        
    }
}
