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

use App\Models\LoginRequest;

use App\Services\Business\Login\SecurityService;
use App\Services\Business\User\UserService;


class ProfileController extends Controller
{
    
    //function that returns profile view
    function index(Request $request) {
        
        //checks if user is logged in
        if (session('user')) {
            return View("user.profile.my-profile", ['user' => session('user')]);
        } else {
            return View("error", array(
                'error' => "You must be logged in to view this page."
            ));
        }
    }
    
  
    
    

}
