<?php

namespace Repositories;

use core\DBConfig;
use PDO;

class AppartmentRepository extends DBConfig
{
    private string $table = "appartments";

    public function __construct()
    {
        $this->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAppartementById(int $id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(["id" => $id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function create() {
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
    

    public function update(int $id, array $data)
    {
        $setColumns = '';
        foreach ($data as $key => $value) {
            $setColumns .= "$key=:$key, ";
        }
        $setColumns = rtrim($setColumns, ', ');

        $sql = "UPDATE $this->table SET $setColumns WHERE id=:id";
        $data['id'] = $id;

        $query = $this->_connexion->prepare($sql);
        $query->execute($data);
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(["id" => $id]);
    }
}
