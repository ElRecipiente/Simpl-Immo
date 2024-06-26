<?php

namespace Repositories;

use core\db\DBConfig;
use PDO;


class OwnerRepository extends DBConfig
{

    private string $table = "owners";

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

    public function getOwnerById(int $id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute([
            "id" => $id
        ]);
    }
}
