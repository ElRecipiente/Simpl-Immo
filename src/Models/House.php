<?php

namespace Models;

class House extends Property {
    protected int $room_number;
    protected int $bedroom_number;
    protected float $garden_size;

    /**
     * @return int
     */
    public function getRoomNumber(): int
    {
        return $this->room_number;
    }

    /**
     * @param int $room_number
     * @return void
     */
    public function setRoomNumber(int $room_number): void
    {
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
     * @return void
     */
    public function setBedroomNumber(int $bedroom_number): void
    {
        $this->bedroom_number = $bedroom_number;
    }

    /**
     * @return float
     */
    public function getGardenSize(): float {
        return $this->garden_size;
    }

    /**
     * @param float $garden_size
     * @return void
     */
    public function setGardenSize(float $garden_size): void
    {
        $this->garden_size = $garden_size;
    }
}