<?php

/**
 * CLC 1
 * ProfileController 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 2-1-2018
 * Controls the flow of the profile view 
 * 
 */



namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;

use App\Services\Business\User\UserService;


class ProfileController extends Controller
{
    
    //function that returns profile view
    function view(Request $request) {
        
        $userService = new UserService();
        $user = session('user');
        
        
        //checks if user is logged in
        if ($userService->loggedIn($user)) {
            
            $updatedUser = $userService->getUser($user->getId());
            $request->session()->put('user', $updatedUser);
            
            
            return View("user.profile.my-profile", ['user' => $updatedUser]);
        } else {
            return View("error", array(
                'error' => "You must be logged in to view this page."
            ));
        }
    }
    
    //function that returns profile view
    function viewProfile(Request $request) {
        
        $userService = new UserService();
        $user = session('user');
        
        
        //checks if user is logged in
        if ($userService->loggedIn($user)) {
            
            $userModel = $userService->getUser($request->input('ID'));

            if (!empty($userModel)) {
                return View("user.profile.view-profile", ['user' => $userModel]);
            } else {
                return View("error", array(
                    'error' => "User doesn't exist."
                ));
            }
            
            
            
        } else {
            return View("error", array(
                'error' => "You must be logged in to view this page."
            ));
        }
    }
    
    
    //function that returns edit profile view
    function edit(Request $request) {
        
        $userService = new UserService();
        $user = session('user');
        
        
        //checks if user is logged in
        if ($userService->loggedIn($user)) {
            return View("user.profile.edit-profile", ['user' => $user]);
        } else {
            return View("error", array(
                'error' => "You must be logged in to view this page."
            ));
        }
    }
    
    
    //function that updates user profile
    function updateProfile(Request $request) {
        
        $userService = new UserService();
        $user = session('user');
        
        
        //checks if user is logged in
        if ($userService->loggedIn($user)) {
            
            //declare variables passed in from form
            $password = $request->input('PASSWORD');
            $firstName = $request->input('FIRSTNAME');
            $lastName = $request->input('LASTNAME');

            $objective = $request->input('OBJECTIVE');
            $education_1 = $request->input('EDUCATION_1');
            $education_2 = $request->input('EDUCATION_2');
            $education_3 = $request->input('EDUCATION_3');
            $skills = $request->input('SKILLS');
            $experience_1 = $request->input('EXPERIENCE_1');
            $experience_2 = $request->input('EXPERIENCE_2');
            $experience_3 = $request->input('EXPERIENCE_3');
            $reference = $request->input('REFERENCE');
            
            
            
            $userRequest = new User($user->getId(), $user->getEmail(), $password, $firstName, $lastName, $user->getRights(), $user->getRole(),
                $objective, $education_1, $education_2, $education_3, $skills, $experience_1, $experience_2, $experience_3, $reference);
                        
            if ($userService->updateUser($userRequest)) {
                $operation = "Successfully updated profile";
            } else {
                $operation = "Error updating profile";
            }
            
            $updatedUser = $userService->getUser($user->getId());
            $request->session()->put('user', $updatedUser);
            
            return View("user.profile.my-profile", ['user' => $updatedUser, 'operation' => $operation]);

        } else {
            return View("error", array(
                'error' => "You must be logged in to view this page."
            ));
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

}
