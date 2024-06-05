<?php

namespace Repositories;

class HouseRepository extends PropertyRepository {

    /**
     * @var string
     */
    private string $table = "houses";

    /**
     * Init connexion by constructing parent
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return void
     */
    public function createHouse() {

        try {

            // Begin transaction to verify if all request are OK
            $this->_connexion->beginTransaction();

            // Execute parent create
            parent::create();

            // Get Last insert ID
            $propertyId = $this->_connexion->lastInsertId();
            $roomNumber = $_POST['room_number'];
            $bedroomNumber = $_POST['bedroom_number'];
            $garden_size = $_POST['garden_size'];

            $sql = "INSERT INTO $this->table (room_number, bedroom_number, garden_size, property_id) VALUES (:room_number, :bedroom_number, :garden_size, :property_id)";
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(":room_number", $roomNumber);
            $query->bindParam(":bedroom_number", $bedroomNumber);
            $query->bindParam(":garden_size", $garden_size);
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


    public function updateHouse($id)
    {
        try {

            // Begin transaction to verify if all request are OK
            $this->_connexion->beginTransaction();

            // Execute parent update
            parent::update();

            $roomNumber = $_POST['room_number'];
            $bedroomNumber = $_POST['bedroom_number'];
            $garden_size = $_POST['garden_size'];

            $sql = "UPDATE $this->table SET room_number = :room_number, bedroom_number = :bedroom_number, garden_size = :garden_size WHERE id = :id";
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(":room_number", $roomNumber);
            $query->bindParam(":bedroom_number", $bedroomNumber);
            $query->bindParam(":garden_size", $garden_size);
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