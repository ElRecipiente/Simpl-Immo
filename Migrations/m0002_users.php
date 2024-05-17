<?php

class m0002_users
{
    public function up()
    {
        return "
        CREATE TABLE users (
            id INT PRIMARY KEY AUTO_INCREMENT,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            firstname VARCHAR(50) NOT NULL,
            lastname VARCHAR(50) NOT NULL,
            mail VARCHAR(255) NOT NULL,
            phone_number INT NOT NULL,
            is_admin BOOLEAN NOT NULL DEFAULT 0
        );";
    }

    public function down()
    {
        return "DROP TABLE IF EXISTS users";
    }
}