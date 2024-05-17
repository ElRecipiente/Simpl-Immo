<?php

class m0004_call_request
{
    public function up()
    {
        return "
        CREATE TABLE call_requests (
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT,
            FOREIGN KEY (user_id) REFERENCES users(id)
        );";
    }

    public function down()
    {
        return "DROP TABLE IF EXISTS call_requests";
    }
}