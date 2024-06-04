<?php

namespace Repositories;

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
            $roomNumber = $_POST['room_number'];
            $bedroomNumber = $_POST['bedroom_number'];
            $garden = $_POST['garden'];

            $sql = "INSERT INTO $this->table (room_number, bedroom_number, garden, property_id) VALUES (:room_number, :bedroom_number, :garden, :property_id)";
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(":room_number", $roomNumber);
            $query->bindParam(":bedroom_number", $bedroomNumber);
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
    

    public function updateAppartement(int $id, array $data)
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

    public function deleteAppartement(int $id)
    {
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(["id" => $id]);
    }
}
