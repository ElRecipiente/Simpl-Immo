<?php

namespace Repositories;

use core\DBConfig;
use Models\Property;
use PDO;

class PropertyRepository extends DBConfig {

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

    public function create() {
        $this->model->setSurfaceArea($_POST["surface_area"]);
        $this->model->setPrice($_POST["price"]);
        $this->model->setDescription($_POST["description"]);
        $this->model->setTypeProperty($_POST["type_property"]);
        $this->model->setTypeTransaction($_POST["type_transaction"]);

        $sql = "INSERT INTO " . $this->table . "(surface_area, price, description, type_property, type_transaction) VALUES (:surface_area, :price, :description, :type_property, :type_transaction)";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':surface_area', $this->model->getSurfaceArea());
        $query->bindParam(':price', $this->model->getPrice());
        $query->bindParam(':description', $this->model->getDescription());
        $query->bindParam(':type_property', $this->model->getTypeProperty());
        $query->bindParam(':type_transaction', $this->model->getTypeTransaction());
        $query->execute();
    }

    /**
     * @param int $surfaceAreaMin
     * @param int $surfaceAreaMax
     * Filter by surface area
     */
    public function filterBySurfaceArea($surfaceAreaMin, $surfaceAreaMax){
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
    public function filterByPrice($priceMin, $priceMax){
        $sql = "SELECT * FROM " . $this->table . " WHERE price > :priceMin AND price < :priceMax";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':price', $priceMin);
        $query->bindParam(':priceMax', $priceMax);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}