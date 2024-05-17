<?php

namespace Repositories;

use core\db\DBConfig;
use Models\Property;
use PDO;

class PropertyRepository extends DBConfig
{

    /**
     * @var string
     */
    private string $table = "properties";

    protected Property $model;

    /**
     * Init connexion to db
     */
    public function __construct()
    {
        $this->getConnection();
        $this->model = new Property();
    }

    /**
     * SELECT ALL in current table
     */
    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $id
     * SELECT ONE BY id in current table
     */
    public function getOneById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function create()
    {
        $surfaceArea = $_POST["surface_area"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $typeProperty = $_POST["type_property"];
        $typeTransaction = $_POST["type_transaction"];

        $sql = "INSERT INTO " . $this->table . "(surface_area, price, description, type_property, type_transaction) VALUES (:surface_area, :price, :description, :type_property, :type_transaction)";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':surface_area', $surfaceArea);
        $query->bindParam(':price', $price);
        $query->bindParam(':description', $description);
        $query->bindParam(':type_property', $typeProperty);
        $query->bindParam(':type_transaction', $typeTransaction);
        $query->execute();
    }

    /**
     * @param int $surfaceAreaMin
     * @param int $surfaceAreaMax
     * Filter by surface area
     */
    public function filterBySurfaceArea($surfaceAreaMin, $surfaceAreaMax)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE surface_area > :surfaceAreaMin AND surface_area < :surfaceAreaMax";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':surfaceAreaMin', $surfaceAreaMin);
        $query->bindParam(':surfaceAreaMax', $surfaceAreaMax);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $price
     * Filter by price
     */
    public function filterByPrice($priceMin, $priceMax)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE price > :priceMin AND price < :priceMax";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':price', $priceMin);
        $query->bindParam(':priceMax', $priceMax);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
