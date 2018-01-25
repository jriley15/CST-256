<?php
/**
 * CLC 1
 * LoginRequest Model 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 1-24-2018
 * Model class that holds data for a login request
 *
 */

namespace App\Models;


class LoginRequest
{
    
    //class member variables
    private $email;
    private $password;
    
    //default constructor
    function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }
    
    //getters and setters

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
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }



    
    
    
}

