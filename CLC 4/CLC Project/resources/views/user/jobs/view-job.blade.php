
<html>



@extends('layouts.appmaster')
@section('title', 'Job')
@section('content')


    <div class="my-profile">
    <div class="content-container">
    <div class="job">
    	<h1>View Job: {{$job->getJobTitle()}}</h1>
        	@if(isset($operation))
    			<div class="operation">
    				{{$operation}}
    			</div>
    			<br>
    		@endif
    	<table>

    		<tr>
    			<td><b>ID: </b></td> 
    			<td>{{$job->getId()}}</td> 
    		</tr>
    		<tr>
    			<td><b>Created by: </b></td> 
    			<td>{{$creator->getFirstName()}} {{$creator->getLastName()}} ({{$creator->getEmail()}})</td> 
    		</tr>
    		<tr>
    			<td><b>Title: </b></td> 
    			<td>{{$job->getJobTitle()}}</td> 
    		</tr>
    		<tr>
    			<td><b>Company: </b></td> 
    			<td>{{$job->getCompanyName()}}</td> 
    		</tr>
    		<tr>
    			<td><b>Salary: </b></td> 
    			<td>{{$job->getSalary()}}</td> 
    		</tr>
    		    		
    		<tr>
    			<td><b>Location: </b></td> 
    			<td>{{$job->getLocation()}}</td> 
    		</tr>
    		<tr>
    			<td><b>Description: </b></td> 
    			<td><textarea readonly>{{$job->getJobDescription()}}</textarea></td> 
    		</tr>

    		<tr>
    			<td><b>Experience Required: </b></td> 
    			<td><textarea readonly>{{$job->getExperienceRequired()}}</textarea></td> 
    		</tr>

    		
    		
    	</table>
    	<a href="{{route('jobs')}}">Back</a>
    		
    	</div>	
    </div>
    </div>
    

@endsection

</html>