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
     * @param $surfaceArea
     * Filter by surface area
     */
    public function filterBySurfaceArea($surfaceArea){
        $sql = "SELECT * FROM " . $this->table . " WHERE surfaceArea = :surfaceArea";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':surfaceArea', $surfaceArea);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $price
     * Filter by price
     */
    public function filterByPrice($price){
        $sql = "SELECT * FROM " . $this->table . " WHERE price = :price";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':price', $price);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}