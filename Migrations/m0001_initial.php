<?php

class m0001_initial
{
    public function up($pdo) // Pass the PDO connection
    {
        // Use the $pdo object to execute SQL statements
        $sql = "CREATE TABLE regions (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL
        );
        CREATE TABLE cities (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            postal_code VARCHAR(20) NOT NULL,
            region_id INT,
            FOREIGN KEY (region_id) REFERENCES regions(id)
        );
        CREATE TABLE owners (
            id INT PRIMARY KEY AUTO_INCREMENT,
            firstname VARCHAR(50) NOT NULL,
            lastname VARCHAR(50) NOT NULL,
            phone_number INT NOT NULL,
            adress VARCHAR(255) NOT NULL,
            mail VARCHAR(255) NOT NULL
        );
        CREATE TABLE properties (
            id INT PRIMARY KEY AUTO_INCREMENT,
            surface_area DECIMAL(10, 2) NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            description TEXT NOT NULL,
            type_transaction VARCHAR(50) NOT NULL,
            type_property VARCHAR(50) NOT NULL,
            city_id INT,
            owner_id INT,
            FOREIGN KEY (city_id) REFERENCES cities(id),
            FOREIGN KEY (owner_id) REFERENCES owners(id)
        );
        CREATE TABLE photos (
            id INT PRIMARY KEY AUTO_INCREMENT,
            url VARCHAR(255) NOT NULL,
            alt VARCHAR(100) NOT NULL,
            property_id INT,
            FOREIGN KEY (property_id) REFERENCES properties(id)
        );";
        $pdo->exec($sql);
        echo 'Applied migration: m0001_initial' . PHP_EOL;
    }

    public function down($pdo)
    {
        $pdo->exec("DROP TABLE IF EXISTS photos");
        $pdo->exec("DROP TABLE IF EXISTS owners");
        $pdo->exec("DROP TABLE IF EXISTS properties");
        $pdo->exec("DROP TABLE IF EXISTS cities");
        echo 'Down migration: m0001_initial' . PHP_EOL;
    }
}
