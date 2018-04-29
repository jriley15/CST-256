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
use App\Models\DTO;
use App\Services\Business\Jobs\JobService;
use Exception;


class RestJobController extends Controller
{

    // function that returns all job data in json format
    function index()
    {
        //initialize job service and call the get jobs function
        $jobService = new JobService();
        $jobModels = $jobService->getJobs();
        
        //check if jobs were fetched properly
        if ($jobModels == null)
            $dto = new DTO(- 1, "Jobs Not Found", $jobModels);
        else
            $dto = new DTO(0, "INDEX", $jobModels);
        
            
        //initialize json variable     
        $json = json_encode($dto, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        
        //return json data in view
        return response($json)->header('Content-Type', 'application/json');
    }

    
    // function that returns json data for jobs
    function show($id)
    {
        //initialize job service
        $jobService = new JobService();
        
        //check if parameter is a numeric id
        if (is_numeric($id)) {
            
            $jobModel = null;
            
            //attempt to load jobmodel from db with passed in param id
            try {
                $jobModel = $jobService->getJob($id);
            } catch (Exception $e) {
                
            }
            
            //check if job was loaded correctly
            if ($jobModel == null)
                $dto = new DTO(- 1, "Job Not Found", $jobModel);
            else
                $dto = new DTO(0, "SHOW", $jobModel);
            
            //initialize json data    
            $json = json_encode($dto, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            
            //return json data in view
            return response($json)->header('Content-Type', 'application/json');
        } else {

            //intialize job models array
            $jobModels = array();
            
            //attempt to search db for jobs that match search criteria (limit to 100 [5 for testing purposes])
            try {
                $jobModels = $jobService->searchJobs($id);
            } catch (Exception $e) {
                
            }
            
            //check if the job models array is empty
            if (empty($jobModels))
                $dto = new DTO(- 1, "No jobs found", $jobModels);
            else {
                
                //check if the maximum amount of search results was reached
                if (sizeof($jobModels) == 5) {
                    $dto = new DTO(0, "100 results max, refine your search criteria", $jobModels);
                } else {
                    $dto = new DTO(0, sizeof($jobModels).' results', $jobModels);
                }
            }
            
            //initialize json data var
            $json = json_encode($dto, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            
            return response($json)->header('Content-Type', 'application/json');
        }
    }



}
