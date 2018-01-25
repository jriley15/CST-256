<?php
/**
 * CLC 1
 * Business Security Service 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 1-24-2018
 * Contains functions that handle form validation checks for users and call data service functions
 *
 */


namespace App\Services\Business;

use App\Models\LoginResponse;
use App\Models\RegisterResponse;
use App\Services\Data\SecurityDAO;

class SecurityService
{
    
    //validates login form request
    public function login($loginRequest) {
        
        //filters passed in variables
        $e = $this->filter($loginRequest->getemail());
        $p = $this->filter($loginRequest->getPassword());
        
        //creates login response model instance
        $response = new LoginResponse();
        $response->setSuccess(false);
        
        //creates security data service instance
        $securityDAO = new SecurityDAO();
        
        
        //validation checks
        if (empty($e)) {
            $response->setMsg("Email cannot be left blank.");
            
        } else if (empty($p)) {
            $response->setMsg("Password cannot be left blank.");
            
        } else if (strlen($e) > 20) {
            $response->setMsg("Email cannot be more than 20 characters long.");
            
        } else if (strlen($p) > 20) {
            $response->setMsg("Password cannot be more than 20 characters long.");
            
        } else if (strlen($e) < 5) { 
            $response->setMsg("Email must be at least 5 characters long.");
            
        } else if (strlen($p) < 5) {
            $response->setMsg("Password must be at least 5 characters long.");
            
        } else if (!$this->IsSafe($p)) {
            $response->setMsg("Password contains illegal characters.");
            
        } else if (!$this->isEmail($e)) {
            $response->setMsg("Email not valid.");
            
        } else {
            
            $loginRequest->setEmail($e);
            $loginRequest->setPassword($p);
            
            //check if email and password combo exists
            if ($securityDAO->verifyUser($loginRequest)) {
                $response->setSuccess(true);
            } else {
                $response->setMsg("Invalid email or password.");
            }
        }

        return $response;

    }

    //validates register form request
    public function register($registerRequest) {
        
        //filters passed in variables
        $e = $this->filter($registerRequest->getEmail());
        $p = $this->filter($registerRequest->getPassword());
        $p2 = $this->filter($registerRequest->getPassword2());
        $f = $this->filter($registerRequest->getFirstName());
        $l = $this->filter($registerRequest->getLastName());
        
        //creates register response model instance
        $response = new RegisterResponse();
        $response->setSuccess(false);
        
        //creates security data service instance
        $securityDAO = new SecurityDAO();

        //validation checks
        if (empty($e)) {
            $response->setMsg("Email cannot be left blank.");
            
        } else if (empty($p)) {
            $response->setMsg("Password cannot be left blank.");
            
        } else if (strlen($e) > 20) {
            $response->setMsg("Email cannot be more than 20 characters long.");
            
        } else if (strlen($p) > 20) {
            $response->setMsg("Password cannot be more than 20 characters long.");
            
        } else if (strlen($f) > 50) {
            $response->setMsg("First name cannot be more than 50 characters long.");
            
        } else if (strlen($l) > 50) {
            $response->setMsg("Last name cannot be more than 50 characters long.");
            
        } else if (strlen($e) < 5) {
            $response->setMsg("Email must be at least 5 characters long.");
            
        } else if (strlen($p) < 5) {
            $response->setMsg("Password must be at least 5 characters long.");
            
        } else if (!$this->IsSafe($p)) {
            $response->setMsg("Email contains illegal characters.");
            
        } else if (!($p === $p2)) {
            $response->setMsg("Passwords must match.");
            
        } else if (!$this->isEmail($e)) {
            $response->setMsg("Email not valid.");
            
        } else {
            
            $registerRequest->setEmail($e);
            $registerRequest->setPassword($p);
            $registerRequest->setFirstName($f);
            $registerRequest->setLastName($l);
            
            //check if user with email already exists
            if (!$securityDAO->userExists($registerRequest)) {
                
                //check if user was inserted correctly
                if ($securityDAO->createUser($registerRequest) > 0) {
                    $response->setSuccess(true);
                } else {
                    $response->setMsg("Error inserting user into database.");
                }

            } else {
                $response->setMsg("User with email already exists.");
            }
        }
        
        return $response;
        
    }
    
    //filters strings
    function filter($str) {
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }
    
    //checks for illegal chars
    function IsSafe($string)
    {
        if(preg_match('/[^a-zA-Z0-9_]/', $string) == 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    //checks if string is valid email
    function isEmail($str) {
        return filter_var($str, FILTER_VALIDATE_EMAIL);
    }
    
}

