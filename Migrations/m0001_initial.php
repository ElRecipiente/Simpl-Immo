<?php

class m0001_initial
{
    public function up()
    {
        $db = "PATH DB";
        $SQL = "TODO";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = "PATH DB";
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}