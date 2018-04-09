
<html>



@extends('layouts.appmaster')
@section('title', 'Job')
@section('content')


    <div class="my-profile">
    <div class="content-container">
    <div class="job">
    	<h1>Group: {{$group->getTitle()}}</h1>
        	@if(isset($operation))
    			<div class="operation">
    				{{$operation}}
    			</div>
    			<br>
    		@endif
    	<table>

    		<tr>
    			<td><b>ID: </b></td> 
    			<td>{{$group->getId()}}</td> 
    		</tr>
    		<tr>
    			<td><b>Title: </b></td> 
    			<td>{{$group->getTitle()}}</td> 
    		</tr>
    		<tr>
    			<td><b>Description: </b></td> 
    			<td><textarea readonly>{{$group->getDescription()}}</textarea></td> 
    		</tr>
    		<tr>
    			<td><b>Creator: </b></td> 
    			<td>{{$creator->getFirstName()}} {{$creator->getLastName()}} (
				    <form action="viewProfile" method="GET" style="display: inline;">
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">	
                        <input type="hidden" name ="ID" value="{{$creator->getId()}}">
                        <a href="#" onclick="this.parentNode.submit();">{{$creator->getEmail()}}</a>
                                		
                    </form>
				)</td> 
    		</tr>
    		<tr>
    			<td><b>Members ({{$group->getMembers()}}): </b></td> 
    			<td>
    				@foreach ($group->getUsers() as $member) 
    				
    					{{$member->getFirstName()}} {{$member->getLastName()}} (
    					<form action="viewProfile" method="GET" style="display: inline;">
                        	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">	
                            <input type="hidden" name ="ID" value="{{$member->getId()}}">
                            <a href="#" onclick="this.parentNode.submit();">{{$member->getEmail()}}</a>
                                		
                       	</form>
    					), 
    				
    				@endforeach	
    			
    			</td> 
    		</tr>
    		<tr>
    			<td><b>Options: </b></td> 
    			<td>
    				@if ($status == 0) 
                		<form action="joinGroup" method="POST"style="margin: 0; vertical-align: center;">
                			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                			<input type="hidden" name="ID" value="<?php echo $group->getId() ?>">
                			<input type="submit" value="Join Group" />
                		</form>
            		@elseif ($status == 1) 
            			<form action="leaveGroup" method="POST"style="margin: 0; vertical-align: center;">
                			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                			<input type="hidden" name="ID" value="<?php echo $group->getId() ?>">
                			<input type="submit" value="Leave Group" />
                		</form>
            		@elseif ($status == 2) 
            		    <form action="editGroup" method="POST"style="display: inline; margin: 0; vertical-align: center;">
                			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                			<input type="hidden" name="ID" value="<?php echo $group->getId() ?>">
                			<input type="submit" value="Edit Group" />
                		</form>
            			<form onSubmit="if(!confirm('Are you sure?')){return false;}" action="deleteGroup" method="POST"style="display: inline; margin: 0; vertical-align: center;">
                			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                			<input type="hidden" name="ID" value="<?php echo $group->getId() ?>">
                			<input type="submit" value="Delete Group" />
                		</form>
                	@endif
    			
    			</td> 
    		</tr>

    	</table>
    	<a href="{{route('groups')}}">Back</a>
    		
    	</div>	
    </div>
    </div>
    

@endsection

</html>