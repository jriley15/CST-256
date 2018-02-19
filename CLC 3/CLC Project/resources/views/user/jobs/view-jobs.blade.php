
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
                    	{{$job->ID}}
                    </td>
        			<td>	
                    	{{$job->TITLE}}
                    </td>
        			<td>	
                    	{{$job->COMPANY}}
                    </td>
        			<td>	
                    	{{$job->LOCATION}}
                    </td> 
                    <td>
                    	<a href="{{route('viewJob', ['id'=>$job->ID])}}">View</a>
                    	@if (session('user')->getRights() > 0) 
                            <a href="{{route('editJob', ['id'=>$job->ID])}}">Edit</a>
                            <a href="{{route('deleteJob', ['id'=>$job->ID])}}">Delete</a>
                     	@endif

                     	
                    </td>
                </tr>

                @endforeach 
            </table>
     	</div>
    </div>
    

@endsection

</html>