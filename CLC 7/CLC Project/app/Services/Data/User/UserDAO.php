<?php

/**
 * CLC 2
 * UserDAO 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 1-31-2018
 * Contains functions that handle user database queries
 *
 */

namespace App\Services\Data\User;

use Illuminate\Support\Facades\DB;
use App\Models\User;


class UserDAO
{
    
       
    //function that returns user table row from db with matching id
    public function findUser($id) {


        $response = DB::table('users')
        ->join('profiles', 'users.ID', '=', 'profiles.USER_ID')
        ->where('ID', $id)->first();
        

        return $response;
    }
    
    //fetches all users from db
    public function retrieveUsers() {
        
        return DB::table('users')
        ->join('profiles', 'users.ID', '=', 'profiles.USER_ID')
        ->get();
        
        
    }
    
    //returns query that searches user table for email and names string comparisons
    public function retrieveUserSearch($search) {
       
        return DB::table('users')
        ->join('profiles', 'users.ID', '=', 'profiles.USER_ID')
        ->where('EMAIL', 'like', '%'.$search.'%')
        ->orWhere('FIRSTNAME', 'like', '%'.$search.'%')
        ->limit(5)
        ->get();

    }
    

    
    
    //updates user row
    public function updateUser($user) {
        
        
        $result = DB::table('users')
        ->join('profiles', 'users.ID', '=', 'profiles.USER_ID')
        ->where('ID', $user->getId())
        ->update(
            ['EMAIL' => $user->getEmail(),
                'PASSWORD' => $user->getPassword(),
                'FIRSTNAME' => $user->getFirstName(),
                'LASTNAME' => $user->getLastName(),
                'RIGHTS' => $user->getRights(),
                'ROLE' => $user->getRole(),
                'OBJECTIVE' => $user->getObjective(),
                'EDUCATION_1' => $user->getEducation_1(),
                'EDUCATION_2' => $user->getEducation_2(),
                'EDUCATION_3' => $user->getEducation_3(),
                'SKILLS' => $user->getSkills(),
                'EXPERIENCE_1' => $user->getExperience_1(),
                'EXPERIENCE_2' => $user->getExperience_2(),
                'EXPERIENCE_3' => $user->getExperience_3(),
                'REFERENCES' => $user->getReferences()
            ]);
            
        
        return $result;
    }
    
    //deletes user row
    public function deleteUser($id) {
        
        return DB::table('users')->where('ID', $id)->delete();
        
    }
}

