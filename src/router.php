<?php

    use Controllers\PropertyController;
    use Controllers\HouseController;
    use Controllers\AppartmentController;
    $propertyController = new PropertyController();
    $houseController = new HouseController();
    $appartmentController = new AppartmentController();

    $uri = $_SERVER['REQUEST_URI'];
    zlog("uri : $uri");

    $routes = [
        "default" => [
            "controller" => $houseController,
            "method" => "index",
        ],
        URL_HOUSEPAGE => [
            "controller" => $houseController,
            "method" => "index",
        ],
        URL_PROPERTYPAGE => [
            "controller" => $propertyController,
            "method" => "index",
        ]
    ];

$route = $routes[$uri] ?? $routes["default"];
$route ["controller"]->{$route["method"]}();
zdebug(["route", $route]);