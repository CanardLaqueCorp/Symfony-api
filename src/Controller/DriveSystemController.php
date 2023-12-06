<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use  App\Repository\DriveSystemRepository;

class DriveSystemController extends AbstractController
{

    // Returns a drive system by id or all drive systems

    /**
     * @Route("/get/drive/system/{id}", name="get_drive_system_by_id", methods={"GET"})
     */
    public function getById(DriveSystemRepository $driveSystemRepo, $id = "all"): JsonResponse
    {
        if ($id == "all") {

            // Get all drive systems
            $driveSystems = $driveSystemRepo->findAll([], ['label' => 'ASC']);

            if ($driveSystems != null) {
                $driveSystemsRes = array();
                foreach ($driveSystems as $driveSystem) {
                    $driveSystemsRes[] = $driveSystem->getDataAll();
                }
                return new JsonResponse([
                    'response' => 'ok',
                    'result' => $driveSystemsRes
                ], 200);
            }
            else {
                return new JsonResponse(['response' => 'Not found'], 404);
            }            
        }
        else {

            // Get drive system by id
            $driveSystem = $driveSystemRepo->find($id);
            
            if($driveSystem == null) {
                return new JsonResponse(['response' => 'Not found'], 404);
            }

            $data = $driveSystem->getDataAll();
            
            return new JsonResponse([
                'response' => 'ok',
                'result' => $data
            ], 200);
        }

    }
}
