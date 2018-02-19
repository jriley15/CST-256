
<html>



@extends('layouts.appmaster')
@section('title', 'Job')
@section('content')


    <div class="my-profile">
    <div class="content-container">
    <div class="job">
    	<h1>View Job: {{$job->TITLE}}</h1>
        	@if(isset($operation))
    			<div class="operation">
    				{{$operation}}
    			</div>
    			<br>
    		@endif
    	<table>

    		<tr>
    			<td><b>ID: </b></td> 
    			<td>{{$job->ID}}</td> 
    		</tr>
    		<tr>
    			<td><b>Title: </b></td> 
    			<td>{{$job->TITLE}}</td> 
    		</tr>
    		<tr>
    			<td><b>Company: </b></td> 
    			<td>{{$job->COMPANY}}</td> 
    		</tr>
    		<tr>
    			<td><b>Salary: </b></td> 
    			<td>{{$job->SALARY}}</td> 
    		</tr>
    		    		
    		<tr>
    			<td><b>Location: </b></td> 
    			<td>{{$job->LOCATION}}</td> 
    		</tr>
    		<tr>
    			<td><b>Description: </b></td> 
    			<td><textarea readonly>{{$job->DESCRIPTION}}</textarea></td> 
    		</tr>

    		<tr>
    			<td><b>Experience Required: </b></td> 
    			<td><textarea readonly>{{$job->EXPERIENCE}}</textarea></td> 
    		</tr>

    		
    		
    	</table>
    	<a href="{{route('jobs')}}">Back</a>
    		
    	</div>	
    </div>
    </div>
    

@endsection

</html>