<?php

namespace Repositories;

use core\db\DBConfig;
use PDO;

class UserRepository extends DBConfig
{
    private string $table = "users";

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

    public function getUserById(int $id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $query = $this->_connexion->prepare($sql);
        $query->execute(["id" => $id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getUserByMail(string $mail)
    {
        $sql = "SELECT * FROM $this->table WHERE mail = :mail";
        $query = $this->_connexion->prepare($sql);
        $query->execute(["mail" => $mail]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function create()
    {
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $mail = $_POST["mail"];
        $phoneNumber = $_POST["phone_number"];
        $isAdmin = $_POST["is_admin"];

        $sql = "INSERT INTO " . $this->table . " (username, password, firstname, lastname, mail, phone_number, is_admin) 
                VALUES (:username, :password, :firstname, :lastname, :mail, :phone_number, :is_admin)";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->bindParam(':firstname', $firstname);
        $query->bindParam(':lastname', $lastname);
        $query->bindParam(':mail', $mail);
        $query->bindParam(':phone_number', $phoneNumber);
        $query->bindParam(':is_admin', $isAdmin);
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
