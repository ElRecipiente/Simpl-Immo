<?php

namespace Repositories;

class GarageRepository extends PropertyRepository {


    /**
     * @var string
     */
    private string $table = "garages";

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
    public function createGarage()
    {

        try {

            // Begin transaction to verify if all request are OK
            $this->_connexion->beginTransaction();

            // Execute parent create
            parent::create();

            // Get Last insert ID
            $propertyId = $this->_connexion->lastInsertId();
            $type = $_POST['type'];
            $underground = $_POST['underground'];

            $sql = "INSERT INTO $this->table (type, underground, property_id) VALUES (:type, :underground, :property_id)";
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(":type", $type);
            $query->bindParam(":underground", $underground);
            $query->bindParam(":property_id", $propertyId);
            $query->execute();

            // Valid transaction if no error
            $this->_connexion->commit();

        } catch (\Exception $e) {

            // Cancel transaction if error
            $this->_connexion->rollback();
            echo "Error: " . $e->getMessage();
        }

    }


    public function updateGarage($id)
    {
        try {

            // Begin transaction to verify if all request are OK
            $this->_connexion->beginTransaction();

            // Execute parent update
            parent::update();

            $type = $_POST['type'];
            $underground = $_POST['underground'];

            $sql = "UPDATE $this->table SET type = :type, underground = :underground WHERE id = :id";
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(":type", $type);
            $query->bindParam(":underground", $underground);
            $query->bindParam(":id", $id);
            $query->execute();

            // Valid transaction if no error
            $this->_connexion->commit();

        } catch (\Exception $e) {

            // Cancel transaction if error
            $this->_connexion->rollback();
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteGarage(int $id)
    {
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(["id" => $id]);
    }
}