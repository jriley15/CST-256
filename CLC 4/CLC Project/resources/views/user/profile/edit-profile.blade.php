
<html>



@extends('layouts.appmaster')
@section('title', 'Edit Profile')
@section('content')


    <div class="my-profile">
    <div class="content-container">
    	<h1>Edit Profile</h1>

    	
    	
    	<form action="updateProfile" method="POST">
    	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    	<table>

    		<tr>
    			<td><b>Email: </b></td> 
    			<td>{{$user->getEmail()}}</td> 
    		</tr>
    		<tr>
    			<td><b>Password: </b></td> 
    			<td><input type="password" name="PASSWORD" value="{{$user->getPassword()}}" /></td>

    		</tr>
    		<tr>
    			<td><b>First Name: </b></td> 
    			<td><input type="text" name="FIRSTNAME" value="{{$user->getFirstName()}}" /></td>
    			
    		</tr>
    		
    		<tr>
    			<td><b>Last Name: </b></td> 
    			<td><input type="text" name="LASTNAME" value="{{$user->getLastName()}}" /></td>
    			
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
    			<td><textarea name="OBJECTIVE" maxlength="500">{{$user->getObjective()}}</textarea></td> 
    		</tr>
    		<tr>
    			<td><b>Education 1: </b></td> 
    			<td><input type="text" name="EDUCATION_1" maxlength="100" value="{{$user->getEducation_1()}}"/></td> 
    		</tr>
    		<tr>
    			<td><b>Education 2: </b></td> 
    			<td><input type="text" name="EDUCATION_2" maxlength="100" value="{{$user->getEducation_2()}}"/></td> 
    		</tr>
    		<tr>
    			<td><b>Education 3: </b></td> 
    			<td><input type="text" name="EDUCATION_3" maxlength="100" value="{{$user->getEducation_3()}}"/></td> 
    		</tr>
    		<tr>
    			<td><b>Skills: </b></td> 
    			<td><textarea name="SKILLS" maxlength="500">{{$user->getSkills()}}</textarea></td> 
    		</tr>
    		<tr>
    			<td><b>Experience 1: </b></td> 
    			<td><input type="text" name="EXPERIENCE_1" maxlength="100" value="{{$user->getExperience_1()}}"/></td> 
    		</tr>
    		<tr>
    			<td><b>Experience 2: </b></td> 
    			<td><input type="text" name="EXPERIENCE_2" maxlength="100" value="{{$user->getExperience_2()}}"/></td> 
    		</tr>
    		<tr>
    			<td><b>Experience 3: </b></td> 
    			<td><input type="text" name="EXPERIENCE_3" maxlength="100" value="{{$user->getExperience_3()}}"/></td> 
    		</tr>
    		
    		<tr>
    		<td><b>References: </b></td> 
    			<td><textarea name="REFERENCE" maxlength="500">{{$user->getReferences()}}</textarea></td> 
    		</tr>
    		
    		
    	</table>
    	<input type="submit" value="Save" />
    	</form>
    </div>
    </div>
    

@endsection

</html>