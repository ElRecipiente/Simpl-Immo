<?php

class m0003_group
{
    public function up()
    {
        return "
        CREATE TABLE garages (
            id INT PRIMARY KEY AUTO_INCREMENT,
            type VARCHAR(50) NOT NULL,
            underground BOOLEAN NOT NULL,
            property_id INT,
            FOREIGN KEY (property_id) REFERENCES properties(id)
        );
        CREATE TABLE houses (
            id INT PRIMARY KEY AUTO_INCREMENT,
            room_number INT NOT NULL,
            bedroom_number INT NOT NULL,
            garden_size DECIMAL(10, 2) NOT NULL,
            property_id INT,
            FOREIGN KEY (property_id) REFERENCES properties(id)
        );
        CREATE TABLE appartments (
            id INT PRIMARY KEY AUTO_INCREMENT,
            room_number INT NOT NULL,
            bedroom_number INT NOT NULL,
            garden BOOLEAN NOT NULL,
            property_id INT,
            FOREIGN KEY (property_id) REFERENCES properties(id)
        );";
    }

    public function down()
    {
        return "
            DROP TABLE IF EXISTS garages
            DROP TABLE IF EXISTS houses
            DROP TABLE IF EXISTS appartments
        ";
    }
}