<?php

namespace Models;

use core\db\DBConfig;

/**
 * Define Property class
 */
class Appartment extends DBConfig
{

    /**
     * @var int
     */
    protected int $room_number;
    /**
     * @var int
     */
    protected int $bedroom_number;
    /**
     * @var tinyint
     */
    protected int $gardien;

    public function getRoom_number()
    {
        return $this->room_number;
    }
    public function getBedroom_number()
    {
        return $this->bedroom_number;
    }
    public function getGardien()
    {
        return $this->gardien;
    }
}
