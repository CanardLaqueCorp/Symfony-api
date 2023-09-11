<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use  App\Repository\DriveSystemRepository;

class DriveSystemController extends AbstractController
{
    /**
     * @Route("/get/drive/system/{id}", name="get_drive_system_by_id", methods={"GET"})
     */
    public function getById(DriveSystemRepository $driveSystemRepo, $id = "all"): JsonResponse
    {
        if ($id == "all") {
            $driveSystems = $driveSystemRepo->findAll([], ['label' => 'ASC']);

            if ($driveSystems != null) {
                $driveSystemsRes = array();
                foreach ($driveSystems as $driveSystem) {
                    $driveSystemsRes[] = $driveSystem->getDataAll();
                }
                return $this->json([
                    'response' => 'ok',
                    'result' => $driveSystemsRes
                ]);
            }
            else {
                return $this->json([
                    'response' => 'notFound'
                ]);
            }            
        }
        else {

            $driveSystem = $driveSystemRepo->find($id);
            
            if($driveSystem == null) {
                return $this->json([
                    'response' => 'notFound'
                ]);
            }

            $data = $driveSystem->getDataAll();
            
            return $this->json([
                'response' => 'ok',
                'result' => $data
            ]);
        }

    }
}
