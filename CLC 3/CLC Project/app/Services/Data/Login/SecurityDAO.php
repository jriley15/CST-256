<?php

/**
 * CLC 1
 * Database Security Service 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 1-24-2018
 * Contains functions that query the users database table with validated data
 *
 */

namespace App\Services\Data\Login;

use Illuminate\Support\Facades\DB;

class SecurityDAO
{
    
    

    //function that checks if user with email AND password combination exists
    public function findUser($loginRequest) {
        $id = DB::table('users')->where('EMAIL', $loginRequest->getEmail())->where('password', $loginRequest->getPassword())->value('ID');
       
        
        
        
        
        
        
        if ($id > 0) {

            return $id;
        } else {
            return -1;
        }
    }
    
    
    
}

