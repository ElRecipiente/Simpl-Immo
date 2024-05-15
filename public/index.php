<?php

require_once "../vendor/autoload.php";

use Controllers\PropertyController;
use Controllers\OwnerController;

echo "Hello World!";

$property_1 = new PropertyController();
$property_1->display();

$owner_1 = new OwnerController();
$owner_1->display();