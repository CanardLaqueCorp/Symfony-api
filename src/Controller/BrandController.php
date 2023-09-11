<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BrandRepository;

class BrandController extends AbstractController
{
    /**
     * @Route("/get/brand/{id}", name="get_brand_by_id", methods={"GET"})
     */
    public function getById(BrandRepository $brandRepo, $id = "all"): JsonResponse
    {
        if ($id == "all") {
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
                return $this->json([
                    'response' => 'notFound'
                ]);
            }            
        }
        else {

            $brand = $brandRepo->find($id);
            
            if($brand == null) {
                return $this->json([
                    'response' => 'notFound'
                ]);
            }

            $data = $brand->getDataAll();
            
            return $this->json([
                'response' => 'ok',
                'result' => $data
            ]);
        }

    }
}
