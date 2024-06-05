<?php

namespace Models;

use core\db\DBConfig;

/**
 * Define Appartment class
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
     * @var bool
     */
    protected bool $gardien;

    /**
     * @return int
     */
    public function getRoomNumber(): int {
        return $this->room_number;
    }
    
    /**
     * @param int $room_number
     */
    public function setRoomNumber(int $room_number): void {
        $this->room_number = $room_number;
    }

    /**
     * @return int
     */
    public function getBedroomNumber(): int {
        return $this->bedroom_number;
    }
    
    /**
     * @param int $bedroom_number
     */
    public function setBedroomNumber(int $bedroom_number): void {
        $this->bedroom_number = $bedroom_number;
    }

    /**
     * @return bool
     */
    public function getGardien(): bool {
        return $this->gardien;
    }
    
    /**
     * @param bool $gardien
     */
    public function setGardien(bool $gardien): void {
        $this->gardien = $gardien;
    }
}
