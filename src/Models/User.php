<?php

namespace Models;

use core\db\DBConfig;

/**
 * Define User class
 */
class User extends DBConfig
{

    /**
     * @var string
     */
    protected string $username;
    /**
     * @var string
     */
    protected string $password;
    /**
     * @var string
     */
    protected string $firstname;
    /**
     * @var string
     */
    protected string $lastname;
    /**
     * @var string
     */
    protected string $phone_number;

    /**
     * @return string
     */
    public function getUsername(): string {
        return $this->username;
    }
    
    /**
     * @param string $username
     */
    public function setUsername(string $username): void {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
    }
    
    /**
     * @param string $password
     */
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFirstname(): string {
        return $this->firstname;
    }
    
    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string {
        return $this->lastname;
    }
    
    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string {
        return $this->phone_number;
    }
    
    /**
     * @param string $phone_number
     */
    public function setPhoneNumber(string $phone_number): void {
        $this->phone_number = $phone_number;
    }
}
