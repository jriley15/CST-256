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
   
    
    // profile fields
    private $firstName;
    private $lastName;
    private $rights;
    private $role;
    private $objective;
    private $education_1;
    private $education_2;
    private $education_3;
    private $skills;
    private $experience_1;
    private $experience_2;
    private $experience_3;
    private $references;
    private $date;
    
    
    
    
    //constructors
    function __construct($id, $email, $password, $firstName, $lastName, $rights, $role, $objective, $education_1, 
        $education_2, $education_3, $skills, $experience_1, $experience_2, $experience_3, $references, $date) {
        
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->rights = $rights;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->role = $role;
        $this->objective = $objective;
        $this->education_1 = $education_1;
        $this->education_2 = $education_2;
        $this->education_3 = $education_3;
        $this->skills = $skills;
        $this->experience_1 = $experience_1;
        $this->experience_2 = $experience_2;
        $this->experience_3 = $experience_3;
        $this->references = $references;
        $this->date = $date;
        
        
    }
    
    
    
    // getters and setters

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
     * @return mixed
     */
    public function getRights()
    {
        return $this->rights;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

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
    public function getEducation_1()
    {
        return $this->education_1;
    }

    /**
     * @return mixed
     */
    public function getEducation_2()
    {
        return $this->education_2;
    }

    /**
     * @return mixed
     */
    public function getEducation_3()
    {
        return $this->education_3;
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
    public function getExperience_1()
    {
        return $this->experience_1;
    }

    /**
     * @return mixed
     */
    public function getExperience_2()
    {
        return $this->experience_2;
    }

    /**
     * @return mixed
     */
    public function getExperience_3()
    {
        return $this->experience_3;
    }

    /**
     * @return mixed
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @param mixed $rights
     */
    public function setRights($rights)
    {
        $this->rights = $rights;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @param mixed $objective
     */
    public function setObjective($objective)
    {
        $this->objective = $objective;
    }

    /**
     * @param mixed $education_1
     */
    public function setEducation_1($education_1)
    {
        $this->education_1 = $education_1;
    }

    /**
     * @param mixed $education_2
     */
    public function setEducation_2($education_2)
    {
        $this->education_2 = $education_2;
    }

    /**
     * @param mixed $education_3
     */
    public function setEducation_3($education_3)
    {
        $this->education_3 = $education_3;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    /**
     * @param mixed $experience_1
     */
    public function setExperience_1($experience_1)
    {
        $this->experience_1 = $experience_1;
    }

    /**
     * @param mixed $experience_2
     */
    public function setExperience_2($experience_2)
    {
        $this->experience_2 = $experience_2;
    }

    /**
     * @param mixed $experience_3
     */
    public function setExperience_3($experience_3)
    {
        $this->experience_3 = $experience_3;
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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    
    
}

