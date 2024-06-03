<?php

namespace core\db;

use PDO;
use PDOException;

abstract class DBConfig
{

    private string $host = "db";
    private string $user = "user";
    private string $pass = "mdp";
    private string $dbname = "simplimmo";
    protected $_connexion;

    public function getConnection()
    {

        // supprime la connexion précédente
        $this->_connexion = null;

        // tentative de connexion
        try {
            $this->_connexion = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
}
