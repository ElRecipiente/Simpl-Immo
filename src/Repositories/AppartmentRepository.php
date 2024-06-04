<?php

namespace Repositories;

use Models\Appartment;

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
     * SELECT ONE BY id in current table JOIN property
     */
    public function getAppartementById(int $id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(["id" => $id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function createAppartement() {

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
