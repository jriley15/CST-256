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

use App\Models\User;

use App\Services\Data\Jobs\JobDAO;
use App\Services\Data\User\UserDAO;

class JobService
{
    
    //returns all jobs from db table
    public function getJobs() {
        $jobDAO = new JobDAO();
        return $jobDAO->retrieveJobs();
    }
    
    
    //returns all jobs from db table
    public function getJob($id) {
        $jobDAO = new JobDAO();
        return $jobDAO->findJob($id);
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
    
}

