<?php

/**
 * CLC 3
 * JobDAO 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 2-18-2018
 * Contains functions that handle job database queries
 *
 */

namespace App\Services\Data\Jobs;

use Illuminate\Support\Facades\DB;



class JobDAO
{
    
    
    //fetches all jobs from db
    public function retrieveJobs() {
        
        return DB::table('jobs')->get();
    }
    
    
    //function that returns job table row from db with matching id
    public function findJob($id) {
        $response = DB::table('jobs')->where('ID', $id)->first();
        
        return $response;
    }
    
    
    
    
    //function that inserts new job in database
    public function createJob($job) {
        $result = DB::table('jobs')->insert(
            ['TITLE' => $job->getJobTitle(),
                'COMPANY' => $job->getCompanyName(),
                'DESCRIPTION' => $job->getJobDescription(),
                'SALARY' => $job->getSalary(),
                'EXPERIENCE_REQUIRED' => $job->getExperienceRequired(),
                'LOCATION' => $job->getLocation(),
                'OWNER_ID' => $job->getOwnerID(),
                'DATE' => now()
            ]);

        return $result;
        
    }
    
    //function that updates job in database
    public function updateJob($job) {
        $result = DB::table('jobs')->
        where('ID', $job->getId())->  
        update(['TITLE' => $job->getJobTitle(),
                'COMPANY' => $job->getCompanyName(),
                'DESCRIPTION' => $job->getJobDescription(),
                'SALARY' => $job->getSalary(),
                'EXPERIENCE_REQUIRED' => $job->getExperienceRequired(),
                'LOCATION' => $job->getLocation()
            ]);
        
        return $result;
        
    }
    
    
    
    //deletes job row
    public function deleteJob($id) {
        
        return DB::table('jobs')->where('ID', $id)->delete();
        
    }
    
    
    
    //searches jobs in db and returns limit of 100 rows matching search criteria
    public function searchJobs($search) {

        return DB::table('jobs')
        ->where('TITLE', 'like', '%'.$search.'%')
        ->orWhere('DESCRIPTION', 'like', '%'.$search.'%')
        ->limit(100)
        ->get();
        
    }
    
    
    
  
}

