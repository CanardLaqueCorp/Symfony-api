<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FuelRepository;

class FuelController extends AbstractController
{
    /**
     * @Route("/get/fuel/{id}", name="get_fuel_by_id", methods={"GET"})
     */
    public function getById(FuelRepository $fuelRepo, $id = "all"): JsonResponse
    {
        if ($id == "all") {
            $fuels = $fuelRepo->findAll([], ['label' => 'ASC']);

            if ($fuels != null) {
                $fuelsRes = array();
                foreach ($fuels as $fuel) {
                    $fuelsRes[] = $fuel->getDataAll();
                }
                return new JsonResponse([
                    'response' => 'ok',
                    'result' => $fuelsRes
                ], 200);
            }
            else {
                return new JsonResponse(['response' => 'Not found'], 404);
            }            
        }
        else {

            $fuel = $fuelRepo->find($id);
            
            if($fuel == null) {
                return new JsonResponse(['response' => 'Not found'], 404);
            }

            $data = $fuel->getDataAll();
            
            return new JsonResponse([
                'response' => 'ok',
                'result' => $data
            ], 200);
        }

    }
}
