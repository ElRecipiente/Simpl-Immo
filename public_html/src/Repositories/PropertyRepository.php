<?php

namespace Repositories;

use core\DBConfig;
use PDO;

class PropertyRepository extends DBConfig {

    private $table = "properties";

    public function __construct()
    {
        $this->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOneById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function filterBySurfaceArea($surfaceArea){
        $sql = "SELECT * FROM " . $this->table . " WHERE surfaceArea = :surfaceArea";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':surfaceArea', $surfaceArea);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function filterByPrice($price){
        $sql = "SELECT * FROM " . $this->table . " WHERE price = :price";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':price', $price);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function create()
    {

    }
}