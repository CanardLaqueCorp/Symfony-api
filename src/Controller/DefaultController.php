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
    public function index()
    {
        $routes = $this->get('router')->getRouteCollection();

        $data = [];
        foreach ($routes as $route) {
            if($route->getPath() != '/' && $route->getPath() != '/_error/{code}.{_format}') {

                $description   = "";
                $params = array();
                $attributes = array();
                
                switch($route->getPath()) {
                    case "/get/brand/{id}" :
                        $description = "Returns data of a specific brand (or data of all the brands)";
                        $params = array(
                            array(
                                "label" => "id",
                                "value" => 'int or "all"',
                                "required" => false
                            )
                        );
                        break;
                    case "/get/car/{id}/{data}" :
                        $description = "Returns data of a specific car (or data of all the cars)";
                        $params = array(
                            array(
                                "label" => "id",
                                "value" => 'int or "all"',
                                "required" => true
                            ),
                            array(
                                "label" => "data",
                                "value" => '"light" or "all"',
                                "required" => false
                            )
                        );
                        break;
                    case "/search/car/{data}" :
                        $description = "Searchs cars with specifics criterias. You can pass the attributes in any order, and you can pass only the attributes you want to use. If you don't pass any attribute, it will return all the cars.";
                        $params = array(
                            array(
                                "label" => "data",
                                "value" => '"light" or "all"',
                                "required" => false
                            )
                        );
                        $attributes = array(
                            array(
                                "label" => "brand",
                                "value" => 'ID of the brand',
                            ),
                            array(
                                "label" => "fuel",
                                "value" => 'ID of the fuel',
                            ),
                            array(
                                "label" => "driveSystem",
                                "value" => 'ID of the driveSystem',
                            ),
                            array(
                                "label" => "carType",
                                "value" => 'ID of the carType',
                            ),
                            array(
                                "label" => "transmission",
                                "value" => 'ID of the transmission',
                            ),
                            array(
                                "label" => "startAndStop",
                                "value" => 'Boolean',
                            ),
                            array(
                                "label" => "gears",
                                "value" => 'Number of gears',
                            ),
                            array(
                                "label" => "cylinder",
                                "value" => 'Number of cylinders',
                            ),
                            array(
                                "label" => "minPrice",
                                "value" => 'Minimum price',
                            ),
                            array(
                                "label" => "maxPrice",
                                "value" => 'Maximum price',
                            ),
                        );
                        break;
                    case "/get/prices/{id}" :
                        $description = "Returns prices data of a specific car";
                        $params = array(
                            array(
                                "label" => "id",
                                "value" => 'int',
                                "required" => true
                            )
                        );
                        break;
                    case "/get/type/{id}" :
                        $description = "Returns data of a specific type (or data of all the types)";
                        $params = array(
                            array(
                                "label" => "id",
                                "value" => 'int or "all"',
                                "required" => false
                            )
                        );
                        break;
                    case "/get/drive/system/{id}" :
                        $description = "Returns data of a specific drive system (or data of all the drvie systems)";
                        $params = array(
                            array(
                                "label" => "id",
                                "value" => 'int or "all"',
                                "required" => false
                            )
                        );
                        break;
                    case "/get/fuel/{id}" :
                        $description = "Returns data of a specific fuel (or data of all the fuels)";
                        $params = array(
                            array(
                                "label" => "id",
                                "value" => 'int or "all"',
                                "required" => false
                            )
                        );
                        break;
                    case "/get/transmission/{id}" :
                        $description = "Returns data of a specific transmission (or data of all the transmissions)";
                        $params = array(
                            array(
                                "label" => "id",
                                "value" => 'int or "all"',
                                "required" => false
                            )
                        );
                        break;
                    case "/get/stats" :
                        $description = "Returns statistics about the cars in the database";
                        break;
                    case "/get/data/max" :
                        $description = "Returns the worst values of the data of the cars in the database";
                        break;
                    
                }

                $data[] = array(
                    "methods" =>$route->getMethods(),
                    "path" => $route->getPath(),
                    "controller" => $route->getDefault('_controller'),
                    "description" => $description,
                    "params" => $params,
                    "attributes" => $attributes
                );
            }
        }

        return $this->render('index.html.twig', [
            'routes' => $data
        ]);

    }
}
