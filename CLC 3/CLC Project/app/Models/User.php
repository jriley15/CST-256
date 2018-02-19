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
    
    // job fields
    private $objective;
    private $education;
    private $skills;
    private $experience;
    private $references;
    
    
    //constructors
    function __construct($id, $email, $password, $firstName, $lastName, $rights, $role, $objective, $education, $skills, $experience, $references ) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->rights = $rights;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->role = $role;
        $this->objective = $objective;
        $this->education = $education;
        $this->skills = $skills;
        $this->experience = $experience;
        $this->references = $references;
    }
    
    
    
    // getters and setters
    
    /**
     * @return mixed
     */
    public function getObjective()
    {
        return $this->objective;
    }
    
    /**
     * @return mixed
     */
    public function getEducation()
    {
        return $this->education;
    }
    
    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }
    
    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }
    
    /**
     * @return mixed
     */
    public function getReferences()
    {
        return $this->references;
    }
    
    /**
     * @param mixed $objective
     */
    public function setObjective($objective)
    {
        $this->objective = $objective;
    }
    
    /**
     * @param mixed $education
     */
    public function setEducation($education)
    {
        $this->education = $education;
    }
    
    /**
     * @param mixed $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }
    
    /**
     * @param mixed $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }
    
    /**
     * @param mixed $references
     */
    public function setReferences($references)
    {
        $this->references = $references;
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

