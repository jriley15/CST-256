
<html>



@extends('layouts.appmaster')
@section('title', 'Profile')
@section('content')


    <div class="my-profile">
    <div class="content-container">
    	<h1>Profile</h1>
        	@if(isset($operation))
    			<div class="operation">
    				{{$operation}}
    			</div>
    			<br>
    	@endif
    	<table>

    		<tr>
    			<td><b>Email: </b></td> 
    			<td>{{$user->getEmail()}}</td> 
    		</tr>
    		<tr>
    			<td><b>Password: </b></td> 
    			<td>{{$user->getPassword()}}</td> 
    		</tr>
    		<tr>
    			<td><b>First Name: </b></td> 
    			<td>{{$user->getFirstName()}}</td> 
    		</tr>
    		
    		<tr>
    			<td><b>Last Name: </b></td> 
    			<td>{{$user->getLastName()}}</td> 
    		</tr>
    		
    		<tr>
    			<td><b>Permissions: </b></td> 
    			<td>{{$user->getRights()}}</td> 
    		</tr>
    		<tr>
    			<td><b>Role: </b></td> 
    			<td>{{$user->getRole()}}</td> 
    		</tr>
    		<tr>
    			<td><b>Objectives: </b></td> 
    			<td><textarea readonly>{{$user->getObjective()}}</textarea></td> 
    		</tr>
    		<tr>
    			<td><b>Education: </b></td> 
    			<td><textarea readonly>{{$user->getEducation()}}</textarea></td> 
    		</tr>
    		<tr>
    			<td><b>Skills: </b></td> 
    			<td><textarea readonly>{{$user->getSkills()}}</textarea></td> 
    		</tr>
    		<tr>
    		<td><b>References: </b></td> 
    			<td><textarea readonly>{{$user->getReferences()}}</textarea></td> 
    		</tr>
    		
    		
    	</table>
    	<td>Edit Profile <a href="{{route('editProfile')}}">here</a></td> 
    		
    		
    </div>
    </div>
    

@endsection

</html>