<?php

namespace App\model;

use core\DBConfig;
class Property extends DBConfig {

    public function __construct()
    {
        $this->getConnection();
    }

    public function createProperty()
    {

    }
}