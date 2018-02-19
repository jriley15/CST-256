<?php

/**
 * CLC 3
 * JobController 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 2-18-2018
 * Controls the flow of the job panel view
 * 
 */



namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Services\Business\User\UserService;
use App\Models\Job;
use App\Models\User;
use App\Services\Business\Jobs\JobService;

class JobController extends Controller
{
    
    
    
    
    //function that returns job listing view
    function index(Request $request) {
        
        $jobService = new JobService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {

            return View("user.jobs.view-jobs", ['jobs' => $jobService->getJobs()]);
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
        
        
    }
    
    //function that submits new job request
    function createJob(Request $request) {
        
        $jobService = new JobService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            $jobTitle = $request->input('TITLE');
            $companyName = $request->input('COMPANY');
            $jobDescription = $request->input('DESCRIPTION');
            $salary = $request->input('SALARY');
            $experienceRequired = $request->input('EXPERIENCE');
            $location = $request->input('LOCATION');
            
            $rules = ['TITLE' => 'Required | Between:1,50',
                'COMPANY' => 'Required | Between:1,50',
                'SALARY' => 'Required | Between:1,50',
                'LOCATION' => 'Required | Between:1,50',
                'EXPERIENCE' => 'Required | Between:1,500',
                'DESCRIPTION' => 'Required | Between:1,500'
                
            ];
           
            $this->validate($request, $rules);

            $job = new Job(-1, $jobTitle, $companyName, $jobDescription, $salary, $experienceRequired, $location, $user->getId());
            
            
            if ($jobService->createJob($job) > 0) {
                return View("user.jobs.view-jobs", ['operation' => "Successfully created job",'jobs' => $jobService->getJobs()]);        
            } else {
                return View("user.jobs.view-jobs", ['operation' => "Error creating job", 'jobs' => $jobService->getJobs()]);
            }
            
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
        
    }
    
    //function that returns job view
    function viewJob(Request $request) {
        
        $jobService = new JobService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            return View("user.jobs.view-job", ['job' => $jobService->getJob($request->input('id'))]);
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }

    }
    
    //function that returns new job view
    function newJob(Request $request) {
        
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            return View("user.jobs.new-job");
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
    }
    
    //function that returns job edit view
    function editJob(Request $request) {
        
        $jobService = new JobService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            return View("user.jobs.edit-job", ['job' => $jobService->getJob($request->input('id'))]);
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
        
    }
    
    //function that deletes job
    function deleteJob(Request $request) {
        
        $jobService = new JobService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            
            if ($jobService->deleteJob($request->input('id')) > 0) {
                return View("user.jobs.view-jobs", ['operation' => "Successfully deleted job",'jobs' => $jobService->getJobs()]);
            } else {
                return View("user.jobs.view-jobs", ['operation' => "Error deleting job", 'jobs' => $jobService->getJobs()]);
            }
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
        
    }
    
    //function that submits new job update request
    function updateJob(Request $request) {
        
        $jobService = new JobService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            $id = $request->input('ID');
            $jobTitle = $request->input('TITLE');
            $companyName = $request->input('COMPANY');
            $jobDescription = $request->input('DESCRIPTION');
            $salary = $request->input('SALARY');
            $experienceRequired = $request->input('EXPERIENCE');
            $location = $request->input('LOCATION');
            
            $rules = ['TITLE' => 'Required | Between:1,50',
                'COMPANY' => 'Required | Between:1,50',
                'SALARY' => 'Required | Between:1,50',
                'LOCATION' => 'Required | Between:1,50',
                'EXPERIENCE' => 'Required | Between:1,500',
                'DESCRIPTION' => 'Required | Between:1,500'
                
            ];
            
            $this->validate($request, $rules);
            
            $job = new Job($id, $jobTitle, $companyName, $jobDescription, $salary, $experienceRequired, $location, $user->getId());
            
            
            if ($jobService->updateJob($job) > 0) {
                return View("user.jobs.view-jobs", ['operation' => "Successfully updated job",'jobs' => $jobService->getJobs()]);
            } else {
                return View("user.jobs.view-jobs", ['operation' => "Error updating job", 'jobs' => $jobService->getJobs()]);
            }
            
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
        
    }
    
    
    
    
    
    
    
    

}
