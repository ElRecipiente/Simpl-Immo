<?php 

    namespace Repositories;

    use core\DBConfig;

    class OwnerRepository extends DBConfig{

        private string $table = "owner";

        public function __construct()
        {
            $this->getConnection();
        }

        public function getAll(){
            $sql = "SELECT * FROM $this->table";
            $query = $this->_connexion->prepare($sql);
            $query->execute();
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