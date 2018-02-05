<?php

/**
 * CLC 2
 * AdminController 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 1-31-2018
 * Controls the flow of the admin panel view and permission checks
 * 
 */



namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Services\Business\User\UserService;
use App\Models\User;

class AdminController extends Controller
{
    
    
    //function that returns admin view
    function index(Request $request) {
        
        $userService = new UserService();

        if ($userService->isAdmin()) {

            return View("user.admin.admin-panel", ['users' => $userService->getUsers()]);
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
        
        
    }
    
    //function that returns admin view with searched users
    function searchUsers(Request $request) {
        
        $userService = new UserService();
        
        if ($userService->isAdmin()) {        
            return View("user.admin.admin-panel", ['users' => $userService->searchUsers( $request->input('search'))]);
        } else {
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
    }
    
    //function that returns edit user view
    function editUser(Request $request) {
        
        $userService = new UserService();
        
        if ($userService->isAdmin()) {
            return View("user.admin.edit-user", ['user' => $userService->getUserQuery( $request->input('ID'))]);
        } else {
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
    }

    //function that updates user with submitted form fields
    function updateUser(Request $request) {  
        
        $userService = new UserService();

        if ($userService->isAdmin()) {
            
            //declare variables passed in from form
            $id = $request->input('ID');
            $email = $request->input('EMAIL');
            $password = $request->input('PASSWORD');
            $firstName = $request->input('FIRSTNAME');
            $lastName = $request->input('LASTNAME');
            $role = $request->input('ROLE');
            $rights = $request->input('RIGHTS');
            $user = new User($id, $email, $password, $firstName, $lastName, $rights, $role);
            
            if ($userService->updateUser($user)) {
                $operation = "Successfully updated user: ".$email;
            } else {
                $operation = "Error updating user: ".$email;
            }          
            
            return View("user.admin.edit-user", ['user' => $userService->getUserQuery( $request->input('ID')),
                'operation' => $operation]);
        } else {
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
    }
    
    //function that deletes user
    function deleteUser(Request $request) {
        
        $userService = new UserService();
 
        if ($userService->isAdmin()) {
            
            $id = $request->input('ID');
            
            if ($userService->deleteUser($id)) {
                $operation = "Successfully deleted user: ".$id;
            } else {
                $operation = "Error deleting user: ".$id;
            }  
            
            
            return View("user.admin.admin-panel", ['users' => $userService->getUsers(), 'operation' => $operation]);
            
        } else {
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
    }

}
