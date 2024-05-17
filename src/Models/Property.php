<?php

namespace Models;

use db\core\DBConfig;

/**
 * Define Property class
 */
class Property extends DBConfig
{

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
    public function getSurfaceArea()
    {
        return $this->surface_area;
    }
    public function setSurfaceArea(float $surface_area)
    {
        $this->surface_area = $surface_area;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTypeTransaction()
    {
        return $this->type_transaction;
    }
    public function setTypeTransaction(string $type_transaction)
    {
        $this->type_transaction = $type_transaction;
    }

    /**
     * @return string
     */
    public function getTypeProperty()
    {
        return $this->type_property;
    }
    public function setTypeProperty(string $type_property)
    {
        $this->type_property = $type_property;
    }
}
