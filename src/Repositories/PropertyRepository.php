<?php

namespace Repositories;

use core\DBConfig;
use PDO;

class PropertyRepository extends DBConfig {

    /**
     * @var string
     */
    private string $table = "properties";

    /**
     * Init connexion to db
     */
    public function __construct()
    {
        $this->getConnection();
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