
<html>


@extends('layouts.appmaster')
@section('title', 'Jobs')




@section('content')


    
    <div class="content-container">
    <div class="admin-panel">
    		<h1>Search for Jobs</h1>
    		<br>
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
    		
    		<form action="doJobSearch" method="POST">
    			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    			<input type="text" placeholder="Search.." name="search">
    			<input type="submit" value="Search" />
    		</form>
    		
    		@if (isset($jobResults))
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
    			@foreach ($jobResults as $job) 
				
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

                    </td>
                </tr>

                @endforeach 
            </table>
            
            @endif
     	</div>
    </div>
    

@endsection

</html>