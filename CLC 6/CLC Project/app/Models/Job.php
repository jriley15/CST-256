<?php



/**
 * CLC 3
 * JobModel 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 2-18-2018
 * Contains all job data fields
 *
 */


namespace App\Models;

class Job implements \JsonSerializable
{
    
    //class member variables
    private $id;
    private $jobTitle;
    private $companyName;
    private $jobDescription;
    private $salary;
    private $experienceRequired;
    private $location;
    private $ownerID;
    private $date;
    
    function __construct($id, $jobTitle, $companyName, $jobDescription, $salary, $experienceRequired, $location, $ownerID, $date) {
        $this->id = $id;
        $this->jobTitle = $jobTitle;
        $this->companyName = $companyName;
        $this->jobDescription = $jobDescription;
        $this->salary = $salary;
        $this->experienceRequired = $experienceRequired;
        $this->location = $location;
        $this->ownerID = $ownerID;
        $this->date = $date;
    }
    
    
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
    
    
    /**
     * @return mixed
     */
    public function getOwnerID()
    {
        return $this->ownerID;
    }

    /**
     * @param mixed $ownerID
     */
    public function setOwnerID($ownerID)
    {
        $this->ownerID = $ownerID;
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

    /**
     * @return mixed
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }
    
    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }
    
    /**
     * @return mixed
     */
    public function getJobDescription()
    {
        return $this->jobDescription;
    }
    
    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }
    

    /**
     * @return mixed
     */
    public function getExperienceRequired()
    {
        return $this->experienceRequired;
    }
    
    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }
    
    /**
     * @param mixed $jobTitle
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }
    
    /**
     * @param mixed $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }
    
    /**
     * @param mixed $jobDescription
     */
    public function setJobDescription($jobDescription)
    {
        $this->jobDescription = $jobDescription;
    }
    
    /**
     * @param mixed $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
    
    /**
     * @param mixed $experienceRequired
     */
    public function setExperienceRequired($experienceRequired)
    {
        $this->experienceRequired = $experienceRequired;
    }
    
    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
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

