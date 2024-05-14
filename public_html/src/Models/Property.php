<?php

namespace Models;

use core\DBConfig;

/**
 * Define Property class
 */
class Property extends DBConfig {

    /**
     * @var float
     */
    protected float $surface_area;
    /**
     * @var float
     */
    protected float $price;
    /**
     * @var string
     */
    protected string $description;
    /**
     * @var string
     */
    protected string $type_transaction;
    /**
     * @var string
     */
    protected string $type_property;

    /**
     * @return float
     */
public function getSurfaceArea() {
    return $this->surface_area;
}

    /**
     * @return float
     */
public function getPrice() {
    return $this->price;
}

    /**
     * @return string
     */
public function getDescription() {
    return $this->description;
}

    /**
     * @param $description
     * @return void
     */
public function setDescription($description) {
    $this->description = $description;
}

    /**
     * @return string
     */
public function getTypeTransaction() {
    return $this->type_transaction;
}

    /**
     * @return string
     */
public function getTypeProperty() {
    return $this->type_property;
}

    /**
     * @return void
     */
public function create() {
    // todo in child class
}

}