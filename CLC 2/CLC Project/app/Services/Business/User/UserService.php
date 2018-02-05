<?php

/**
 * CLC 2
 * UserService 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 1-31-2018
 * Contains functions that handle backend user logic checks 
 *
 */


namespace App\Services\Business\User;

use App\Models\User;
use App\Services\Data\User\UserDAO;

class UserService
{
    
    //returns user model from db based on id
    public function getUser($id) {

        $userDAO = new UserDAO();
        $response = $userDAO->findUser($id);

        return new User($response->ID, $response->EMAIL, $response->PASSWORD, $response->FIRSTNAME, $response->LASTNAME, $response->RIGHTS, $response->ROLE);
        
    }
    
    //returns query result from db based on id
    public function getUserQuery($id) {
        
        $userDAO = new UserDAO();
        
        return $userDAO->findUser($id);
    }
    
    //deletes user from db 
    public function deleteUser($user) {
        
        $userDAO = new UserDAO();
        if ($userDAO->deleteUser($user) > 0)
            return true;
            
            return false;
            
    }
    
    //updates user
    public function updateUser($user) {
        
        $userDAO = new UserDAO();
        if ($userDAO->updateUser($user) > 0) 
            return true;
        
        return false;
        
    }
    
    //returns user search query
    public function searchUsers($search) {
        $userDAO = new UserDAO();
        return $userDAO->retrieveUserSearch($search);
    }
    
    //returns all users from db table
    public function getUsers() {
        $userDAO = new UserDAO();
        return $userDAO->retrieveUsers();
    }
    
    
    //checks whether use is logged in or not
    public function loggedIn() {
        if (session('user')) 
            return true;
        return false;

    }
    
    //checks if user is an admin or not
    public function isAdmin() {
        if ($this->loggedIn()) 
            if (session('user')->getRights() > 0)
                return true;
            
        return false;        
        
    }
    
    
}

