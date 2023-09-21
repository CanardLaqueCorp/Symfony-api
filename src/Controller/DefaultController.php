<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index() : JsonResponse
    {
        $routes = $this->get('router')->getRouteCollection();

        $data = [];
        foreach ($routes as $route) {
            $data[$route->getPath()] = $route->getMethods();
        }

        return new JsonResponse($data);
    }
}
