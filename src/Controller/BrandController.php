<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BrandRepository;


// Returns a brand by id or all brands

class BrandController extends AbstractController
{
    /**
     * @Route("/get/brand/{id}", name="get_brand_by_id", methods={"GET"})
     */
    public function getById(BrandRepository $brandRepo, $id = "all"): JsonResponse
    {
        if ($id == "all") {
            
            // Get all brands
            $brands = $brandRepo->findAll([], ['label' => 'ASC']);

            if ($brands != null) {
                $brandsRes = array();
                foreach ($brands as $brand) {
                    $brandsRes[] = $brand->getDataAll();
                }
                return $this->json([
                    'response' => 'ok',
                    'result' => $brandsRes
                ]);
            }
            else {
                return new JsonResponse(['response' => 'Not found'], 404);
            }            
        }
        else {

            // Get brand by id
            $brand = $brandRepo->find($id);
            
            if($brand == null) {
                return new JsonResponse(['response' => 'Not found'], 404);
            }

            $data = $brand->getDataAll();
            
            return new JsonResponse([
                'response' => 'ok',
                'result' => $data
            ], 200);
        }

    }
}
