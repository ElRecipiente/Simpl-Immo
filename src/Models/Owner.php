<?php

namespace Models;

use core\db\DBConfig;

/**
 * Define Property class
 */
class Owner extends DBConfig
{

    /**
     * @var string
     */
    protected string $firstname;
    /**
     * @var string
     */
    protected string $lastname;
    /**
     * @var int
     */
    protected int $phone_number;
    /**
     * @var string
     */
    protected string $adress;
    /**
     * @var string
     */
    protected string $mail;

    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }
    public function getAdress()
    {
        return $this->adress;
    }
    public function getMail()
    {
        return $this->mail;
    }
    // public function setFirstname($firstname){
    //     $this->firstname = $firstname;
    // }

}
