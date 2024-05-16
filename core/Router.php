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