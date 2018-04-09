<?php

/**
 * CLC 4
 * GroupService 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 2-28-2018
 * Contains functions that handle backend group logic checks and fetches 
 *
 */


namespace App\Services\Business\Groups;

use App\Models\Group;
use App\Models\User;

use App\Services\Data\Groups\GroupDAO;
use App\Services\Data\User\UserDAO;

class GroupService
{
    
    //returns all groups from db table
    public function getGroups() {
        $groupDAO = new GroupDAO();
        
        $response = $groupDAO->retrieveGroups();
        
        $groups = array();
        
        //loops through every query row and adds a new group model onto the groups array with query data
        foreach ($response as $group) {
            $groups[] = new Group($group->ID, $group->OWNER_ID, $group->TITLE, $group->DESCRIPTION, $group->MEMBERS, $group->DATE);
        }
        
        
        return $groups;
    }
    
    
    //returns all groups from db table
    public function getGroup($id) {
        $groupDAO = new GroupDAO();
        $userDAO = new UserDAO();
        
        $groupQuery = $groupDAO->findGroup($id);
        
        //creates new group model object with query row data
        $group = new Group($groupQuery->ID, $groupQuery->OWNER_ID, $groupQuery->TITLE, $groupQuery->DESCRIPTION, $groupQuery->MEMBERS, $groupQuery->DATE);
        
        //querys db for group members in this group
        $groupMembersQuery = $groupDAO->findGroupMembers($id);
        
        $users = array();
        
        //creates a user model for every row of users that belong to this specific group
        foreach ($groupMembersQuery as $uid) {
            
            $userQuery = $userDAO->findUser($uid->USER_ID);
            
            $users[] = new User($userQuery->ID, $userQuery->EMAIL, $userQuery->PASSWORD, $userQuery->FIRSTNAME, $userQuery->LASTNAME, $userQuery->RIGHTS,
                $userQuery->ROLE, $userQuery->OBJECTIVE,  $userQuery->EDUCATION_1, $userQuery->EDUCATION_2,
                $userQuery->EDUCATION_3, $userQuery->SKILLS, $userQuery->EXPERIENCE_1, $userQuery->EXPERIENCE_2, $userQuery->EXPERIENCE_3,
                $userQuery->REFERENCES, $userQuery->DATE);
        }
        
        //sets the groups users to our newly created users array filled with data
        $group->setUsers($users);
      
        return $group;
    }

    //creates new group row
    public function createGroup($group) {
        $groupDAO = new groupDAO();
        return $groupDAO->createGroup($group);
    }
    

    //updates group row
    public function updateGroup($group) {
        $groupDAO = new groupDAO();
        return $groupDAO->updateGroup($group);
    }
    
    //updates group row
    public function deletegroup($group) {
        $groupDAO = new groupDAO();
        return $groupDAO->deleteGroup($group);
    }
    
    //updates group row
    public function addUserToGroup($groupId, $userId) {
        $groupDAO = new groupDAO();
        return $groupDAO->addUserToGroup($groupId, $userId);
        
    }
    
    //querys db to return boolean on whether user is a member of group or not
    public function isGroupMember($userId, $groupId) {
        $groupDAO = new groupDAO();
        return $groupDAO->isGroupMember($userId, $groupId);
    }

    //updates group_members table and removes user from group
    public function removeUserFromGroup($groupId, $userId) {
        $groupDAO = new groupDAO();
        return $groupDAO->removeUserFromGroup($groupId, $userId);
        
    }
    
}

