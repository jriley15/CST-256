<?php

/**
 * CLC 6
 * RestProfileController 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 4-5-2018
 * Contains the rest profile return functions
 * 
 */



namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Exception;



use App\Models\DTO;
use App\Models\User;

use App\Services\Business\User\UserService;


class RestProfileController extends Controller
{
    
    // function that returns all profile data in json format
    function index() {
        
        //initialize user service and call the get users function
        $userService = new UserService();
        $userModels = $userService->getUsers();
        
        //check if users were fetched properly
        if ($userModels == null)
            $dto = new DTO(- 1, "Users Not Found", $userModels);
        else
            $dto = new DTO(0, "INDEX", $userModels);
        
        //initialize json variable     
        $json = json_encode($dto, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        
        //return json data in view
        return response($json)->header('Content-Type', 'application/json');
        
        
    }
    
    
    // function that returns json data for users
    function show($id) {
        
        //initialize user service
        $userService = new UserService();
        
        //check if parameter is a numeric id
        if (is_numeric($id)) {
        
            $userModel = null;
            
            //attempt to load usermodel from db with passed in param id
            try {
                $userModel = $userService->getUser($id);
            } catch (Exception $e) {
                
            }
            
            //check if user was loaded correctly
            if ($userModel == null)
                $dto = new DTO(- 1, "User Not Found", $userModel);
            else
                $dto = new DTO(0, "SHOW", $userModel);
            
            //initialize json data 
            $json = json_encode($dto, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            
            //return json data in view
            return response($json)->header('Content-Type', 'application/json');
                
        } else {
            
            //intialize user models array
            $userModels = array();
            
            //attempt to search db for users that match search criteria (limit to 100 [2 for testing purposes])
            try {
                $userModels = $userService->searchUsers($id);
            } catch (Exception $e) {
                
            }
            
            //check if the user models array is empty
            if (empty($userModels))
                $dto = new DTO(- 1, "No users found", $userModels);
            else {
                    //check if the maximum amount of search results was reached
                    if (sizeof($userModels) == 2) {
                        $dto = new DTO(0, "100 results max, refine your search criteria", $userModels);
                    } else {
                        $dto = new DTO(0, sizeof($userModels).' results', $userModels);
                    }
                }
                
                //initialize json data var
                $json = json_encode($dto, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                
                return response($json)->header('Content-Type', 'application/json');
        }
        
    }
    
    
    


    
    

}
