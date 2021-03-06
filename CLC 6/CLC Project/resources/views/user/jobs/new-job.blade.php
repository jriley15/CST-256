
<html>



@extends('layouts.appmaster')
@section('title', 'Job')
@section('content')


    <div class="my-profile">
    <div class="content-container">
    <div class="job">
    	<h1>Create Job</h1>
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
    	<form action="createJob" method="POST">
    	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">	
        	<table>
    
        		<tr>
        			<td><b>Title: </b></td> 
        			<td><input type="text" name="TITLE" value="" /></td>
        		</tr>
        		<tr>
        			<td><b>Company: </b></td> 
        			<td><input type="text" name="COMPANY" value="" /></td>
        		</tr>
        		<tr>
        			<td><b>Salary: </b></td> 
        			<td><input type="text" name="SALARY" value="" /></td>
        		</tr>
        		    		
        		<tr>
        			<td><b>Location: </b></td> 
        			<td><input type="text" name="LOCATION" value="" /></td>
        		</tr>
        		<tr>
        			<td><b>Description: </b></td> 
        			<td><textarea name="DESCRIPTION" maxlength="500"></textarea></td> 
        		</tr>
    
        		<tr>
        			<td><b>Experience Required: </b></td> 
        			<td><textarea name="EXPERIENCE" maxlength="500"></textarea></td> 
        		</tr>
    
        		
        		
        	</table>
        	<input type="submit" value="Submit" />
        	
        	
    	</form>
    	<a href="{{route('jobs')}}">Back</a>
    		
    	</div>	
    </div>
    </div>
    

@endsection

</html>