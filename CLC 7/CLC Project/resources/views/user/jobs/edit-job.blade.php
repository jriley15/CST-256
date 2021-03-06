
<html>



@extends('layouts.appmaster')
@section('title', 'Edit Job')
@section('content')


    <div class="my-profile">
    <div class="content-container">
    <div class="job">
    	<h1>Edit Job</h1>
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
    	<form action="updateJob" method="POST">
    	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">	
    	
    	<input type="hidden" name ="ID" value="{{$job->getId()}}">
        	<table>
    
        		<tr>
        			<td><b>Title: </b></td> 
        			<td><input type="text" name="TITLE" value="{{$job->getJobTitle()}}" /></td>
        		</tr>
        		<tr>
        			<td><b>Company: </b></td> 
        			<td><input type="text" name="COMPANY" value="{{$job->getCompanyName()}}" /></td>
        		</tr>
        		<tr>
        			<td><b>Salary: </b></td> 
        			<td><input type="text" name="SALARY" value="{{$job->getSalary()}}" /></td>
        		</tr>
        		    		
        		<tr>
        			<td><b>Location: </b></td> 
        			<td><input type="text" name="LOCATION" value="{{$job->getLocation()}}" /></td>
        		</tr>
        		<tr>
        			<td><b>Description: </b></td> 
        			<td><textarea name="DESCRIPTION" maxlength="500">{{$job->getJobDescription()}}</textarea></td> 
        		</tr>
    
        		<tr>
        			<td><b>Experience Required: </b></td> 
        			<td><textarea name="EXPERIENCE" maxlength="500">{{$job->getExperienceRequired()}}</textarea></td> 
        		</tr>
    
        		
        		
        	</table>
        	<input type="submit" value="Save" />
        	
        	
    	</form>
    	<a href="{{route('jobs')}}">Back</a>
    		
    	</div>	
    </div>
    </div>
    

@endsection

</html>