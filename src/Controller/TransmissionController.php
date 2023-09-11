<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TransmissionRepository;

class TransmissionController extends AbstractController
{
    /**
     * @Route("/get/transmission/{id}", name="get_transmission_by_id", methods={"GET"})
     */
    public function getById(TransmissionRepository $transmissionRepo, $id = "all"): JsonResponse
    {
        if ($id == "all") {
            $transmissions = $transmissionRepo->findAll([], ['label' => 'ASC']);

            if ($transmissions != null) {
                $transmissionsRes = array();
                foreach ($transmissions as $transmission) {
                    $transmissionsRes[] = $transmission->getDataAll();
                }
                return $this->json([
                    'response' => 'ok',
                    'result' => $transmissionsRes
                ]);
            }
            else {
                return $this->json([
                    'response' => 'notFound'
                ]);
            }            
        }
        else {

            $transmission = $transmissionRepo->find($id);
            
            if($transmission == null) {
                return $this->json([
                    'response' => 'notFound'
                ]);
            }

            $data = $transmission->getDataAll();
            
            return $this->json([
                'response' => 'ok',
                'result' => $data
            ]);
        }

    }
}
