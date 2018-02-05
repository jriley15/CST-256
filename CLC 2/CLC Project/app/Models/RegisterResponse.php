<?php

/**
 * CLC 1
 * RegisterResponse Model 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 1-24-2018
 * Model class that holds data for a register response
 *
 */

namespace App\Models;

class RegisterResponse
{
    //class member variables
    private $success;
    private $msg;
    
    //constructor
    function __construct() {
        $success = false;
    }
    
    //getters and setters
    
    /**
     * @return mixed
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param mixed $success
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }

    /**
     * @param mixed $data
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    
    
    
    
}

