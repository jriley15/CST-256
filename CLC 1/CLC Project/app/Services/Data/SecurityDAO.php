<?php

/**
 * CLC 1
 * Database Security Service 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 1-24-2018
 * Contains functions that query the users database table with validated data
 *
 */

namespace App\Services\Data;

use Illuminate\Support\Facades\DB;

class SecurityDAO
{
    
    //function that checks if user with email AND password combination exists
    public function verifyUser($loginRequest) {
        $response = DB::table('users')->where('EMAIL', $loginRequest->getEmail())->where('password', $loginRequest->getPassword())->count();
        if ($response > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    //function that checks if user with email exists
    public function userExists($registerRequest) {
        $response = DB::table('users')->where('EMAIL', $registerRequest->getEmail())->count();
        
        if ($response > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    //function that inserts new user in database
    public function createUser($registerRequest) {
        $result = DB::table('users')->insert(
            ['EMAIL' => $registerRequest->getEmail(), 'PASSWORD' => $registerRequest->getPassword()
                , 'FIRSTNAME' => $registerRequest->getFirstName(), 'LASTNAME' => $registerRequest->getLastName()
            ]
            );
        
        return $result;

    }
    
    
}

