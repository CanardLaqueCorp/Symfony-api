<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CarTypeController extends AbstractController
{
    /**
     * @Route("/car/type", name="app_car_type")
     */
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CarTypeController.php',
        ]);
    }
    
    public function getById(CarTypeRepository $carTypeRepo, $id = "all"): JsonResponse
    {
        if ($id == "all") {
            $carTypes = $carTypeRepo->findAll([], ['label' => 'ASC']);

            if ($carTypes != null) {
                $carTypesRes = array();
                foreach ($carTypes as $carType) {
                    $carTypesRes[] = $carType->getDataAll();
                }
                return $this->json([
                    'response' => 'ok',
                    'result' => $carTypesRes
                ]);
            }
            else {
                return $this->json([
                    'response' => 'notFound'
                ]);
            }            
        }
        else {

            $carType = $carTypeRepo->find($id);
            
            if($carType == null) {
                return $this->json([
                    'response' => 'notFound'
                ]);
            }

            $data = $carType->getDataAll();
            
            return $this->json([
                'response' => 'ok',
                'result' => $data
            ]);
        }

    }
}
