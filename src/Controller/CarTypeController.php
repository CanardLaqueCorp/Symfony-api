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
