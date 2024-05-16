<?php

namespace Models;

class Garage extends Property {

    protected string $type;
    protected bool $underground = false;

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function isUnderground(): bool {
        return $this->underground;
    }

    /**
     * @param bool $underground
     * @return void
     */
    public function setUnderground(bool $underground): void
    {
        $this->underground = $underground;
    }
}