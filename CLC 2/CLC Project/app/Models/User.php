<?php

/**
 * CLC 2
 * UserModel 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 2-1-2018
 * Contains all user data fields
 *
 */

namespace App\Models;

class User
{
    
    //class member variables
    private $id;
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $rights;
    private $role;
    
    
    //constructor
    function __construct($id, $email, $password, $firstName, $lastName, $rights, $role) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->rights = $rights;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->role = $role;
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
     * @return mixed
     */
    public function getRights()
    {
        return $this->rights;
    }
    
    /**
     * @param mixed $password2
     */
    public function setRights($rights)
    {
        $this->rights = $rights;
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
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    
    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    
    
    
    
}

