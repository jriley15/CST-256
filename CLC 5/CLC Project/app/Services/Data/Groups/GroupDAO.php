<?php

/**
 * CLC 4
 * GroupDAO 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 2-28-2018
 * Contains functions that handle group database queries
 *
 */

namespace App\Services\Data\Groups;

use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class GroupDAO
{
    
    
    //fetches all groups from db
    public function retrieveGroups() {
        
        return DB::table('groups')->get();
    }
    
    
    //function that returns group table row from db with matching id
    public function findGroup($id) {
        
        $response = DB::table('groups')->where('ID', $id)->first();

        return $response;
    }
    
    //function that returns group member rows from db with matching group id
    public function findGroupMembers($id) {
        
        $response = DB::table('group_members')->where('GROUP_ID', $id)->get();
        
        return $response;
    }
    
    //function that inserts new group in database
    public function createGroup($group) {

        $result =  DB::table('groups')->insert(
            ['TITLE' => $group->getTitle(),
                'DESCRIPTION' => $group->getDescription(),
                'MEMBERS' => $group->getMembers(),
                'OWNER_ID' => $group->getOwner_id(), 
                'DATE' => now()
            ]);
        
        
        
        return $result;
        
    }
    
    //function that updates group in database
    public function updateGroup($group) {
        $result = DB::table('groups')->
        where('ID', $group->getId())->  
        update( ['TITLE' => $group->getTitle(),
            'DESCRIPTION' => $group->getDescription(),
            'MEMBERS' => $group->getMembers(),
        ]);
        
        return $result;
        
    }
    
    //function that checks if member is in group already
    public function isGroupMember($userId, $groupId) { 
        $rows = DB::table('group_members')->where('GROUP_ID', $groupId)->where('USER_ID', $userId)->count();
        return $rows > 0;
    }
    
    
    //deletes job row
    public function deleteGroup($id) {
        
        return DB::table('groups')->where('ID', $id)->delete();
        
    }
    
    //function that removes user from a group and updates members count
    public function removeUserFromGroup($groupId, $userId) {
         
        $response = DB::table('group_members')->
        where('USER_ID', $userId)->
        where ('GROUP_ID', $groupId)->delete();

        $group = $this->findGroup($groupId);
        
        DB::table('groups')->
        where('ID', $groupId)->
        update( [
            'MEMBERS' => ($group->MEMBERS)-1
            
        ]);
        
        return $response;
        
    }
    
    //function that adds user from a group and updates members count
    public function addUserToGroup($groupId, $userId) {
        
        $response = DB::table('group_members')->insert(
            ['USER_ID' => $userId,
                'GROUP_ID' => $groupId
        ]);
        
        $group = $this->findGroup($groupId);
        
        DB::table('groups')->
        where('ID', $groupId)->
        update( [
            'MEMBERS' => ($group->MEMBERS)+1
            
        ]);
        

        return $response;
    }
    
    
    
  
}

