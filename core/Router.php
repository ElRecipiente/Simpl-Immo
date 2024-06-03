<?php

namespace core;

use Controllers\ErrorController;
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
            "/add-property" => [
                "controller" => $propertyController,
                "method" => "addProperty",
            ],
            "/appartment" => [
                "controller" => $appartmentController,
                "method" => "display",
            ],
            "/create-appartment" => [
                "controller" => $appartmentController,
                "method" => "createAppartment",
            ],
            "/add-appartment" => [
                "controller" => $appartmentController,
                "method" => "addAppartment",
            ],
            "/owner" => [
                "controller" => $ownerController,
                "method" => "display",
            ]
        ];

        if (!array_key_exists($uri, $routes)) {
            return $routes["default"]["controller"]->{$routes["default"]["method"]}();
        }

        return $routes[$uri]["controller"]->{$routes[$uri]["method"]}();
    }

}