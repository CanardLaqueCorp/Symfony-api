<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarTypeRepository;

class CarTypeController extends AbstractController
{
    /**
     * @Route("/get/type/{id}", name="get_type_by_id", methods={"GET"})
     */
    public function getById(CarTypeRepository $carTypeRepo, $id = "all"): JsonResponse
    {
        if ($id == "all") {
            $carTypes = $carTypeRepo->findAll([], ['label' => 'ASC']);

            if ($carTypes != null) {
                $carTypesRes = array();
                foreach ($carTypes as $carType) {
                    $carTypesRes[] = $carType->getDataAll();
                }
                return new JsonResponse([
                    'response' => 'ok',
                    'result' => $carTypesRes
                ], 200);
            }
            else {
                return new JsonResponse(['response' => 'Not found'], 404);
            }            
        }
        else {

            $carType = $carTypeRepo->find($id);
            
            if($carType == null) {
                return new JsonResponse(['response' => 'Not found'], 404);
            }

            $data = $carType->getDataAll();
            
            return new JsonResponse([
                'response' => 'ok',
                'result' => $data
            ], 200);
        }

    }
}
