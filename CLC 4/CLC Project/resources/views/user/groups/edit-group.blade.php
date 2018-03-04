
<html>



@extends('layouts.appmaster')
@section('title', 'Edit Job')
@section('content')


    <div class="my-profile">
    <div class="content-container">
    <div class="job">
    	<h1>Edit Group</h1>
        	@if(isset($operation))
    			<div class="operation">
    				{{$operation}}
    			</div>
    			<br>
    		@endif
    		@if(isset($errors))
        		<div style="color: red">
                    <ul style="list-style-type: none">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            	</div>
            @endif	
        	<table>
        		<form id="update" action="updateGroup" method="POST">
                	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">	
                	
                	<input type="hidden" name ="ID" value="{{$group->getId()}}">
            		<tr>
            			<td><b>Title: </b></td> 
            			<td><input type="text" name="TITLE" value="{{$group->getTitle()}}" /></td>
            		</tr>   		
            		<tr>
            			<td><b>Description: </b></td> 
            			<td><textarea name="DESCRIPTION" maxlength="500">{{$group->getDescription()}}</textarea></td> 
            		</tr>        		
            		
        		</form>
            		<tr>

            			<td><b>Members ({{$group->getMembers()}}): </b></td> 
            			<td>
            				@foreach ($group->getUsers() as $member) 
            				
            					{{$member->getFirstName()}} {{$member->getLastName()}} ({{$member->getEmail()}}): 
            					[<form action="removeFromGroup" method="POST" style="display: inline;" onSubmit="if(!confirm('Are you sure?')){return false;}">
                                		<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">	
                                		<input type="hidden" name ="USER_ID" value="{{$member->getId()}}">
                                		<input type="hidden" name ="GROUP_ID" value="{{$group->getId()}}">
                                		<a href="#" onclick="this.parentNode.submit();">Remove</a>
                                		
                                	</form>], 
            				
            				@endforeach
            			
        				</td>  
        			</tr>
    
        		
        		
        	</table>
        	<input form="update" type="submit" value="Save" />

    	
    	<a href="{{route('groups')}}">Back</a>
    		
    	</div>	
    </div>
    </div>
    

@endsection

</html>