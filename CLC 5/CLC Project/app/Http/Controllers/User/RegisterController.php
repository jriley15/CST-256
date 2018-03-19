<?php

/**
 * CLC 1
 * RegisterController 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 1-24-2018
 * Controls the flow of the register view form to the validation checks and database service
 *
 */


namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RegisterRequest;

use App\Services\Business\Register\SecurityService;
use App\Services\Data\Register\SecurityDAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    
    //function that returns register view
    function index(Request $request) {
        return View("user.register.register-form");
    }
    
    
    function attemptRegister(Request $request) {
        
        //declare variables passed in from form
        $email = $request->input('email');
        $password = $request->input('password');
        $password2 = $request->input('password2');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $role = $request->input('role');

        //initialize register request model
        $registerRequest = new RegisterRequest($email, $password, $password2, $firstName, $lastName, $role);
        
        //initialize security business service 
        $securityService = new SecurityService();
        
        //generate register response from security service register function
        $response = $securityService->register($registerRequest);
        
        //check if registration went through
        if ($response->getSuccess()) {
            
            //show register passed view
            return View('user.register.registerPassed', array(
                'email' => $registerRequest->getEmail()
            ));
        } else {
            
            //show register failed view
            return View('user.register.register-form', array(
                'error' => $response->getMsg()
            ));
        }
        
    }
    
}
