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
                return $this->json([
                    'response' => 'ok',
                    'result' => $fuelsRes
                ]);
            }
            else {
                return $this->json([
                    'response' => 'notFound'
                ]);
            }            
        }
        else {

            $fuel = $fuelRepo->find($id);
            
            if($fuel == null) {
                return $this->json([
                    'response' => 'notFound'
                ]);
            }

            $data = $fuel->getDataAll();
            
            return $this->json([
                'response' => 'ok',
                'result' => $data
            ]);
        }

    }
}
