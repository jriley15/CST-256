<?php
namespace  App\Models;

/**
 * CLC 4
 * GroupModel 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 2-28-2018
 * Contains all group data fields
 *
 */



class Group
{
    
    
    private $id;
    private $owner_id;
    private $title;
    private $description;
    private $members;
    private $users;
    private $date;

    function __construct($id, $owner_id, $title, $description, $members, $date) {
        $this->id = $id;
        $this->owner_id = $owner_id;
        $this->title= $title;
        $this->description = $description;
        $this->members = $members;
        $this->date = $date;
    }
    
    
    
    
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
    public function getOwner_id()
    {
        return $this->owner_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $owner_id
     */
    public function setOwner_id($owner_id)
    {
        $this->owner_id = $owner_id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    /**
     * @return mixed
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param mixed $members
     */
    public function setMembers($members)
    {
        $this->members = $members;
    }
    /**
     * @return multitype:
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param multitype: $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }


    public function isMember($id) {
        if (!empty($this->users))
            foreach ($this->users as $user) 
                if ($user->getId() == $id)
                    return true;
        
        return false;
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

