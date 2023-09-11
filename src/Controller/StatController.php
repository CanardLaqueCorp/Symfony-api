<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarTHRepository;
use App\Repository\BrandRepository;
use App\Repository\CarTypeRepository;

class StatController extends AbstractController
{
    /**
     * @Route("/get/stats/", name="get_stats", methods={"GET"})
     */
    public function getById(CarTHRepository $carRepo, BrandRepository $brandRepo, CarTypeRepository $carTypeRepo): JsonResponse
    {
        $cars = $carRepo->findAll();
        $brands = $brandRepo->findAll();
        $types = $carTypeRepo->findAll();

        if ($cars == null || $brands == null || $types == null) {
            return $this->json([
                'response' => 'notFound'
            ]);
        }       

        return new JsonResponse([
            'response' => 'ok',
            'result' => [
                'cars' => count($cars),
                'brands' => count($brands),
                'types' => count($types)
            ]
        ]);
    }
}


