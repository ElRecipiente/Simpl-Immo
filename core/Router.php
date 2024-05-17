<?php

namespace core;

use Controllers\ErrorController;
use Controllers\OwnerController;
use Controllers\PropertyController;

class Router {

    public function __construct() {
        session_start();
    }

    public function run() {

        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        $errorController = new ErrorController();
        $propertyController = new PropertyController();
        $ownerController = new OwnerController();

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
            "/edit-property" => [
                "controller" => $propertyController,
                "method" => "editProperty",
            ],
            "/update-property" => [
                "controller" => $propertyController,
                "method" => "updateProperty",
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