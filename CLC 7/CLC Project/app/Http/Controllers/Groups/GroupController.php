<?php

/**
 * CLC 4
 * GroupController 1
 * Authors: Jordan Riley and Antonio Jabrail
 * 2-28-2018
 * Controls the flow of the group panel view
 * 
 */



namespace App\Http\Controllers\Groups;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Services\Business\User\UserService;
use App\Models\Group;
use App\Models\Job;
use App\Models\User;
use App\Services\Business\Groups\GroupService;
use App\Services\Business\Jobs\JobService;

class GroupController extends Controller
{
    
    
    
    //function that returns job listing view
    function index(Request $request) {
        
        $groupService = new GroupService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {

            return View("user.groups.view-groups", ['groups' => $groupService->getGroups()]);
            
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
        
        
    }
    
    //function that submits new group request
    function createGroup(Request $request) {
        
        $groupService = new GroupService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            $groupTitle = $request->input('TITLE');
            $groupDescription = $request->input('DESCRIPTION');

            //validation rules
            $rules = ['TITLE' => 'Required | Between:1,50',
                'DESCRIPTION' => 'Required | Between:1,500',
            ];
           
            $this->validate($request, $rules);

            //group model holding updated group information
            $group = new Group(-1, $user->getId(), $groupTitle, $groupDescription, 0, now());
            
            //check if updated was successful
            if ($groupService->createGroup($group) > 0) {
                return View("user.groups.view-groups", ['operation' => "Successfully created group",'groups' => $groupService->getGroups()]);        
            } else {
                return View("user.groups.view-groups", ['operation' => "Error creating group", 'groups' => $groupService->getGroups()]);
            }
            
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
        
    }
    
    //function that returns job view
    function viewGroup(Request $request) {
        
        $groupService = new GroupService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            $group = $groupService->getGroup($request->input('ID'));
            $creator =  $userService->getUser($group->getOwner_id());
            
            //user isn't in group and isn't a admin, show join option
            $status = 0;
            
            //user is owner of the group, show delete option
            if ($user->getId() == $group->getOwner_id()) {
                $status = 2;
                
            //user is member of group, show leave option    
            } else if ($group->isMember($user->getId())) {
                $status = 1;
            }
            
            //show view with passed in data
            return View("user.groups.view-group", ['creator' => $creator, 'group' => $group, 'status' => $status]);
            
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }

    }
    
    //function that returns new job view form
    function newGroup(Request $request) {
        
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            return View("user.groups.new-group");
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
    }
    
    //function that returns job edit view
    function editGroup(Request $request) {
        
        $groupService = new GroupService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            $group = $groupService->getGroup($request->input('ID'));
            
            if ($group->getOwner_id() == $user->getId() || $userService->isAdmin($user)) {
                 return View("user.groups.edit-group", ['group' => $group]);
            } else {
                return View("error", array(
                    'error' => "You don't have permission to edit this group."
                ));
            }
            
           
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
        
    }
    
    //function that deletes job
    function deleteGroup(Request $request) {
        
        $groupService = new GroupService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            
            if ($groupService->deleteGroup($request->input('ID')) > 0) {
                return View("user.groups.view-groups", ['operation' => "Successfully deleted group",'groups' => $groupService->getGroups()]);
            } else {
                return View("user.groups.view-groups", ['operation' => "Error deleting group", 'groups' => $groupService->getGroups()]);
            }
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
        
    }
    
    
    
    
    //function that submits new job update request
    function updateGroup(Request $request) {
        
        $groupService = new GroupService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            $id = $request->input('ID');
            $groupTitle = $request->input('TITLE');
            $groupDescription = $request->input('DESCRIPTION');
            
            $rules = ['TITLE' => 'Required | Between:1,50',
                'DESCRIPTION' => 'Required | Between:1,500',
            ];
            
            
            $this->validate($request, $rules);        
            $group = new Group($id, $user->getId(), $groupTitle, $groupDescription, 0, now());
            
            if ($groupService->updateGroup($group) > 0) {
                return View("user.groups.view-group", ['creator' => $user, 'status' => 2, 'operation' => "Successfully updated group",'group' => $groupService->getGroup($id)]);
            } else {
                return View("user.groups.view-group", ['creator' => $user, 'status' => 2, 'operation' => "No rows updated", 'group' => $groupService->getGroup($id)]);
            }
            
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
        
    }
    
    //function that submits a join group request
    function joinGroup(Request $request) {
        
        $groupService = new GroupService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            $id = $request->input('ID');
            
            //check if user is already in group
            
            if ($groupService->isGroupMember($user->getId(), $id)) {
                return View("error", array(
                    'error' => "You're already in this group."
                ));
                
            } else {

                if ($groupService->addUserToGroup($id, $user->getId()) > 0) {
                    
                    $group = $groupService->getGroup($request->input('ID'));
                    $creator =  $userService->getUser($group->getOwner_id());
                    
                    $status = 0;
                    
                    if ($user->getId() == $group->getOwner_id()) {
                        $status = 2;
                    } else if ($group->isMember($user->getId())) {
                        $status = 1;
                    }
                    
                    return View("user.groups.view-group", ['creator' => $creator, 'status' => $status, 'operation' => "Successfully joined group",'group' => $group]);
                } else {
                    return View("user.groups.view-group", ['creator' => $creator, 'status' => $status, 'operation' => "Error joining group", 'group' => $group]);
                }
            }
        } else {
            
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
        
    }
    
    //function that submits a leave group request
    function leaveGroup(Request $request) {
        
        $groupService = new GroupService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            $groupId = $request->input('ID');

            //check if user is in group
            
            if ($groupService->isGroupMember($user->getId(), $groupId)) {

                if ($groupService->removeUserFromGroup($groupId, $user->getId()) > 0) {
                    
                    $group = $groupService->getGroup($groupId);
                    $creator =  $userService->getUser($group->getOwner_id());
                    
                    $status = 0;
                    
                    if ($user->getId() == $group->getOwner_id()) {
                        $status = 2;
                    } else if ($group->isMember($user->getId())) {
                        $status = 1;
                    }
                    
                    return View("user.groups.view-group", ['creator' => $creator, 'status' => $status, 'operation' => "Successfully left group",'group' => $group]);
                } else {
                    return View("user.groups.view-group", ['creator' => $creator, 'status' => $status, 'operation' => "Error leaving group", 'group' => $group]);
                }
                
            } else {  
                return View("error", array(
                    'error' => "You're not in this group."
                ));
            }
        } else {
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
    }
    
    //function that submits a leave group request
    function removeFromGroup(Request $request) {
        
        $groupService = new GroupService();
        $userService = new UserService();
        $user = session('user');
        
        if ($userService->loggedIn($user)) {
            
            $groupId = $request->input('GROUP_ID');
            $userId = $request->input('USER_ID');
            
            //check if user is in group
            
            if ($groupService->isGroupMember($userId, $groupId)) {
                
                if ($groupService->removeUserFromGroup($groupId, $userId) > 0) {
                    
                    $group = $groupService->getGroup($groupId);
                    $creator =  $userService->getUser($group->getOwner_id());
                    
                    $status = 0;
                    
                    if ($user->getId() == $group->getOwner_id()) {
                        $status = 2;
                    } else if ($group->isMember($userId)) {
                        $status = 1;
                    }
                    
                    return View("user.groups.edit-group", ['operation' => "Successfully removed user group", 'group' => $group]);
                    
                    //return View("user.groups.view-group", ['creator' => $creator, 'status' => $status, 'operation' => "Successfully removed user group",'group' => $group]);
                } else {
                    return View("user.groups.edit-group", ['operation' => "Error removing user from group", 'group' => $group]);
                    
                    //return View("user.groups.view-group", ['creator' => $creator, 'status' => $status, 'operation' => "Error removing user from group", 'group' => $group]);
                }
                
            } else {
                return View("error", array(
                    'error' => "User not in group."
                ));
            }
        } else {
            return View("error", array(
                'error' => "You don't have permission to view this page."
            ));
        }
    }
    
    
    

}
