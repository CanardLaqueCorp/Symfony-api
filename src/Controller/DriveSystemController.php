<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DriveSystemController extends AbstractController
{
    /**
     * @Route("/drive/system", name="app_drive_system")
     */
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DriveSystemController.php',
        ]);
    }

    public function getById(DriveSystemRepository $driveSystemRepo, $id = "all"): JsonResponse
    {
        if ($id == "all") {
            $driveSystems = $driveSystemRepo->findAll([], ['label' => 'ASC']);

            if ($driveSystems != null) {
                $driveSystems = array();
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
