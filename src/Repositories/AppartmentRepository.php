<?php

namespace Repositories;

use PDO;

class AppartmentRepository extends PropertyRepository
{
    /**
     * @var string
     */
    private string $table = "appartments";

    /**
     * Init connexion by constructing parent
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $id
     * SELECT ONE BY properties JOIN apartments, houses & garages
     */
    public function getOneById($id)
    {
        $sql = "SELECT * FROM $this->table 
        JOIN properties ON properties.id = $this->table.property_id
        WHERE $this->table.property_id = :id";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @return void
     */
    public function createAppartement() {

        try {

            // Begin transaction to verify if all request are OK
            $this->_connexion->beginTransaction();

            // Execute parent create
            parent::create();

            // Get Last insert ID
            $propertyId = $this->_connexion->lastInsertId();
            $roomNumber = $_POST['a_room_number'];
            $bedroomNumber = $_POST['a_bedroom_number'];
            $garden = $_POST['garden'];

            $sql = "INSERT INTO $this->table (a_room_number, a_bedroom_number, garden, property_id) VALUES (:a_room_number, :a_bedroom_number, :garden, :property_id)";
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(":a_room_number", $roomNumber);
            $query->bindParam(":a_bedroom_number", $bedroomNumber);
            $query->bindParam(":garden", $garden);
            $query->bindParam(":property_id", $propertyId);
            $query->execute();

            // Valid transaction if no error
            $this->_connexion->commit();

        }
        catch (\Exception $e) {

            // Cancel transaction if error
            $this->_connexion->rollback();
            echo "Error: " . $e->getMessage();
        }

    }
    

    public function updateAppartement($id)
    {
        try {

            // Begin transaction to verify if all request are OK
            $this->_connexion->beginTransaction();

            // Execute parent update
            parent::update();

            $roomNumber = $_POST['a_room_number'];
            $bedroomNumber = $_POST['a_bedroom_number'];
            $garden = $_POST['garden'];

            $sql = "UPDATE $this->table SET a_room_number = :a_room_number, a_bedroom_number = :a_bedroom_number, garden = :garden WHERE id = :id";
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(":a_room_number", $roomNumber);
            $query->bindParam(":a_bedroom_number", $bedroomNumber);
            $query->bindParam(":garden", $garden);
            $query->bindParam(":id", $id);
            $query->execute();

            // Valid transaction if no error
            $this->_connexion->commit();

        }
        catch (\Exception $e) {

            // Cancel transaction if error
            $this->_connexion->rollback();
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteAppartement(int $id)
    {
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(["id" => $id]);
    }
}
