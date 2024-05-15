<?php

    use Controllers\PropertyController;
    use Controllers\HouseController;
    $propertyController = new PropertyController();
    $houseController = new HouseController();

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