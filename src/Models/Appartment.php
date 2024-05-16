<?php

namespace Models;

use core\DBConfig;

/**
 * Define Property class
 */
class Appartment extends DBConfig {

    /**
     * @var string
     */
    protected string $room_number;
    /**
     * @var string
     */
    protected string $bedroom_number;
    /**
     * @var int
     */
    protected int $gardien;

    public function getRoom_number(){
        return $this->room_number;
    }
    public function getBedroom_number(){
        return $this->bedroom_number;
    }    
    public function getGardien(){
        return $this->gardien;
    }
}