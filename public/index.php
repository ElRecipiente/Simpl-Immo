<?php

require_once "../vendor/autoload.php";

use Controllers\PropertyController;

echo "Hello World!";

$property_1 = new PropertyController();
$property_1->display();