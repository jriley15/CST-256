<?php

/**
 * CLC 3
 * JobService 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 2-18-2018
 * Contains functions that handle backend job logic checks and fetches 
 *
 */


namespace App\Services\Business\Jobs;

use App\Models\Job;
use App\Models\User;

use App\Services\Data\Jobs\JobDAO;
use App\Services\Data\User\UserDAO;

class JobService
{
    

    //returns all jobs from db table
    public function getJobs() {
        $jobDAO = new JobDAO();
        $response = $jobDAO->retrieveJobs();
        
        $jobs = array();
        
        foreach ($response as $job) {
            $jobs[] = new Job($job->ID, $job->TITLE, $job->COMPANY, $job->DESCRIPTION, 
                $job->SALARY,$job->EXPERIENCE_REQUIRED,$job->LOCATION,$job->OWNER_ID, $job->DATE);
        }
        
        return $jobs;
        
    }
    
    //returns all jobs from db table
    public function getJob($id) {
        $jobDAO = new JobDAO();
                
        $response = $jobDAO->findJob($id);
        
        $job = new Job($response->ID, $response->TITLE, $response->COMPANY, $response->DESCRIPTION,
            $response->SALARY,$response->EXPERIENCE_REQUIRED,$response->LOCATION,$response->OWNER_ID, $response->DATE);
        
        return $job;
    }

    //creates new job row
    public function createJob($job) {
        $jobDAO = new JobDAO();
        return $jobDAO->createJob($job);
    }
    

    //updates job row
    public function updateJob($job) {
        $jobDAO = new JobDAO();
        return $jobDAO->updateJob($job);
    }
    
    //updates job row
    public function deleteJob($job) {
        $jobDAO = new JobDAO();
        return $jobDAO->deleteJob($job);
    }
    
    //returns jobs from db table that match search criteria
    public function searchJobs($search) {
        $jobDAO = new JobDAO();
        
        $response = $jobDAO->searchJobs($search);
        
        $jobs = array();
        
        foreach ($response as $job) {
            $jobs[] = new Job($job->ID, $job->TITLE, $job->COMPANY, $job->DESCRIPTION,
                $job->SALARY,$job->EXPERIENCE_REQUIRED,$job->LOCATION,$job->OWNER_ID, $job->DATE);
        }
        
        return $jobs;
    }
    
    
    
}

