<?php

/**
 * Author: Logan Orender
 * Date: 4/27/2022
 * File: user.class.php
 * Description:
 */
class User
{
    private $userID, $email, $password, $firstName, $lastName, $userType;

    public function __construct($email, $password, $firstName, $lastName,$userType)
    {
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userType = $userType;
    }

    /**
     * @param mixed $userType
     */
    public function setUserId($userType): void
    {
        $this->userType = $userType;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->userType;
    }
}