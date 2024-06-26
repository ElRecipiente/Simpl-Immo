<?php

namespace Repositories;

use core\db\DBConfig;

use PDO;
use PDOException;

class PropertyRepository extends DBConfig
{

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
     * SELECT ALL properties JOIN apartments, houses & garages
     */
    public function getAll()
    {
        $sql = "SELECT $this->table.*,
        appartments.a_room_number, appartments.a_bedroom_number, appartments.garden,
        houses.room_number, houses.bedroom_number, houses.garden_size,
        garages.type, garages.underground
        FROM $this->table
        LEFT JOIN appartments ON $this->table.id = appartments.property_id AND $this->table.type_property = 'Appartement'
        LEFT JOIN houses ON $this->table.id = houses.property_id AND $this->table.type_property = 'Maison'
        LEFT JOIN garages ON $this->table.id = garages.property_id AND $this->table.type_property = 'Garage'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function create() : void
    {
        $surfaceArea = trim($_POST["surface_area"]);
        $price = trim($_POST["price"]);
        $description = $_POST["description"];
        $typeProperty = $_POST["type_property"];
        $typeTransaction = $_POST["type_transaction"];

        $sql = "INSERT INTO $this->table (surface_area, price, description, type_property, type_transaction) VALUES (:surface_area, :price, :description, :type_property, :type_transaction)";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':surface_area', $surfaceArea);
        $query->bindParam(':price', $price);
        $query->bindParam(':description', $description);
        $query->bindParam(':type_property', $typeProperty);
        $query->bindParam(':type_transaction', $typeTransaction);
        $query->execute();
    }

    public function update() : void
    {
        $id = $_POST["id"];
        $surfaceArea = trim($_POST["surface_area"]);
        $price = trim($_POST["price"]);
        $description = $_POST["description"];
        $typeProperty = $_POST["type_property"];
        $typeTransaction = $_POST["type_transaction"];

        $sql = "UPDATE  $this->table SET surface_area = :surface_area, price = :price, description = :description, type_property = :type_property, type_transaction = :type_transaction WHERE id = :id";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':surface_area', $surfaceArea);
        $query->bindParam(':price', $price);
        $query->bindParam(':description', $description);
        $query->bindParam(':type_property', $typeProperty);
        $query->bindParam(':type_transaction', $typeTransaction);
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function delete($id) : void {

        try {
            $this->_connexion->beginTransaction();

            $sql = "DELETE FROM appartments 
            WHERE property_id = :id";

            $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute();

            $this->_connexion->commit();
        }
        catch (PDOException $e) {
            $this->_connexion->rollback();
            echo "Error: " . $e->getMessage();
        }

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
