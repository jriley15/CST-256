<?php

/**
 * CLC 1
 * LoginController 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 1-24-2018
 * Controls the flow of the login view form to the validation checks and database service
 * 
 */



namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoginRequest;
use App\Services\Business\SecurityService;

class LoginController extends Controller
{
    
    //function that returns login view
    function index(Request $request) {
        return View("user.login");
    }
    
    //function that is called on when user submits login form
    function attemptLogin(Request $request) {
        
        //declare variables passed in from form
        $email = $request->input('email');
        $password = $request->input('password');

        //initialize login request model
        $loginRequest = new LoginRequest($email, $password);
        
        //initialize security business service 
        $securityService = new SecurityService();
        
        //generate login response from security service login function
        $response = $securityService->login($loginRequest);
     
        //check if login passed
        if ($response->getSuccess()) {
            
            //show login passed view
            return View('user.loginPassed', array(
                'email' => $loginRequest->getEmail()
                
            ));
        } else {
            
            //show login failed view
            return View('user.loginFailed', array(
                'msg' => $response->getMsg()
            ));
        }
        
       
    }
    
    
    

}
