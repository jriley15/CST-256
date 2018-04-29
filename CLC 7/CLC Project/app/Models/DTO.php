<?php
namespace App\Models;

/**
 * CLC 5
 * DTO 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 4-29-2018
 * Contains all DTO data fields
 *
 */



class DTO implements \JsonSerializable
{
    
    //data fields
    private $errorCode;
    private $errorMessage;
    private $data;
    
    //constructor with arguments
    public function __construct($errorCode, $errorMessage, $data)
    {
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
        $this->data = $data;
    }
    
    //json serialize function
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
