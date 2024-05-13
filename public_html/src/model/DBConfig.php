<?php

namespace App\model;

use PDO;
use PDOException;

class DBConfig {

    private string $host = "db";
    private string $user = "user";
    private string $pass = "mdp";
    private string $dbname = "simplimmo";

    public function getConnection() {
        try {
            $db= new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user, $this->pass);
            echo "connecté !";
            return $db;

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }

    }

}