<?php

namespace core;

use Controllers\ErrorController;
use Controllers\OwnerController;
use Controllers\PropertyController;
use Controllers\AppartmentController;
use Controllers\UserController;

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
        $userController = new UserController();

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

            "/users" => [
                "controller" => $userController,
                "method" => "display",
            ],
            "/connexion" => [
                "controller" => $userController,
                "method" => "connexion",
            ],
            "/create-user" => [
                "controller" => $userController,
                "method" => "createUser",
            ],
            "/add-user" => [
                "controller" => $userController,
                "method" => "addUser",
            ],
            "/edit-user" => [
                "controller" => $userController,
                "method" => "editUser",
            ],
            "/update-user" => [
                "controller" => $userController,
                "method" => "updateUser",
            ],
            "/delete-user" => [
                "controller" => $userController,
                "method" => "deleteUser",
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
            ],
            "/login" => [
                "controller" => $userController,
                "method" => "showLoginForm",
            ],
            "/login-submit" => [
                "controller" => $userController,
                "method" => "login",
            ],
            "/dashboard" => [
                "controller" => $userController,
                "method" => "dashboard",
            ],
            "/logout" => [
                "controller" => $userController,
                "method" => "logout",
            ],
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
