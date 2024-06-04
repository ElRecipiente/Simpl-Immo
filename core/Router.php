<?php

namespace core;

use Controllers\ErrorController;
use Controllers\GarageController;
use Controllers\HouseController;
use Controllers\OwnerController;
use Controllers\PropertyController;
use Controllers\AppartmentController;


class Router {

    public function __construct() {
        session_start();
    }

    public function run() {

        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        $errorController = new ErrorController();
        $propertyController = new PropertyController();
        $ownerController = new OwnerController();
        $appartmentController = new AppartmentController();
        $houseController = new HouseController();
        $garageController = new GarageController();

        $routes = [
            "default" => [
                "controller" => $errorController,
                "method" => "pageNotFound",
            ],
            "/" => [
                "controller" => $propertyController,
                "method" => "display",
            ],
            "/create-property" => [
                "controller" => $propertyController,
                "method" => "createProperty",
            ],
            "/create-property-appartement" => [
                "controller" => $appartmentController,
                "method" => "createPropertyAppartment",
            ],
            "/create-property-maison" => [
                "controller" => $houseController,
                "method" => "createPropertyHouse",
            ],
            "/create-property-garage" => [
                "controller" => $garageController,
                "method" => "createPropertyGarage",
            ],
            "/edit-property" => [
                "controller" => $propertyController,
                "method" => "editProperty",
            ],
            "/update-property-appartement" => [
                "controller" => $appartmentController,
                "method" => "updatePropertyAppartment",
            ],
            "/update-property-maison" => [
                "controller" => $houseController,
                "method" => "updatePropertyHouse",
            ],
            "/update-property-garage" => [
                "controller" => $garageController,
                "method" => "updatePropertyGarage",
            ],
            "/delete-property" => [
                "controller" => $propertyController,
                "method" => "deleteProperty",
            ],
            "/owner" => [
                "controller" => $ownerController,
                "method" => "display",
            ]
        ];

        if (!array_key_exists($uri, $routes)) {
            return $routes["default"]["controller"]->{$routes["default"]["method"]}();
        }

        if (isset($_GET["id"])) {
            $getParamId = $_GET["id"];
            return $routes[$uri]["controller"]->{$routes[$uri]["method"]}($getParamId);
        }

        return $routes[$uri]["controller"]->{$routes[$uri]["method"]}();
    }

}