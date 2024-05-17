<?php

namespace Repositories;

use core\db\DBConfig;
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

    public function create(array $data)
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
        $query = $this->_connexion->prepare($sql);
        $query->execute($data);
        return $this->_connexion->lastInsertId();
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
