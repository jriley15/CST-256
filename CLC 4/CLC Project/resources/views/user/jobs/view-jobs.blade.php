
<html>


@extends('layouts.appmaster')
@section('title', 'Jobs')




@section('content')


    
    <div class="content-container">
    <div class="admin-panel">
    		<h1>Job Listings</h1>
    		@if (session('user')->getRights() > 0) 
    			<div>Admin permissions: <a href="{{route('newJob')}}">Create</a> new job listing</div>
    		@endif
    		<br>
    		<div>Select a job below to view</div>
    	
    		<br>
    		@if(isset($operation))
    			<div class="operation">
    				{{$operation}}
    			</div>
    			<br>
    		@endif

    		
    		<table>
    			
    			<th>
    				ID
    			</th>
    			<th>
    				Title
    			</th>
    			<th>
    				Company
    			</th>
    			<th>
    				Location
    			</th>
    			<th>
    				Operation
    			</th>
    			@foreach ($jobs as $job) 
				
    			<tr>
    			    <td>	
                    	{{$job->getId()}}
                    </td>
        			<td>	
                    	{{$job->getJobTitle()}}
                    </td>
        			<td>	
                    	{{$job->getCompanyName()}}
                    </td>
        			<td>	
                    	{{$job->getLocation()}}
                    </td> 
                    <td>

                		<form action="viewJob" method="GET"style="margin: 0; vertical-align: center; display: inline;">
                			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                			<input type="hidden" name="ID" value="<?php echo $job->getId() ?>">
                			<input type="submit" value="View" />
                		</form>
                		@if (session('user')->getRights() > 0) 
                			<form action="editJob" method="POST"style="margin: 0; vertical-align: center; display: inline;">
                    			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    			<input type="hidden" name="ID" value="<?php echo $job->getId() ?>">
                    			<input type="submit" value="Edit" />
                    		</form>
                			<form onSubmit="if(!confirm('Are you sure?')){return false;}" action="deleteJob" method="POST"style="display: inline; margin: 0; vertical-align: center;">
                    			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    			<input type="hidden" name="ID" value="<?php echo $job->getId() ?>">
                    			<input type="submit" value="Delete" />
                    		</form>
                    	@endif

                    </td>
                </tr>

                @endforeach 
            </table>
     	</div>
    </div>
    

@endsection

</html>