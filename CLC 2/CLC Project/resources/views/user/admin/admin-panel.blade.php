
<html>


@extends('layouts.appmaster')
@section('title', 'Home')




@section('content')


    
    <div class="content-container">
    <div class="admin-panel">
    		<h1>Admin Panel</h1>
    		<div>Select a user below to edit their data</div>
    		<br>
    		@if(isset($operation))
    			<div class="operation">
    				{{$operation}}
    			</div>
    			<br>
    		@endif
    		<form action="adminSearch" method="POST">
    			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    			<input type="text" placeholder="Search.." name="search">
    			<input type="submit" value="Search Users" />
    		</form>
    		
    		<table>
    			
    			<th>
    				ID
    			</th>
    			<th>
    				Email Address
    			</th>
    			<th>
    				Password
    			</th>
    			<th>
    				First Name
    			</th>
    			<th>
    				Last Name
    			</th>
    			<th>
    				Rights
    			</th>
    			<th>
    				Role
    			</th>
    			<th>
    				Operation
    			</th>
    			@foreach ($users as $user) 
				
    			<tr>
    			    <td>	
                    	{{$user->ID}}
                    </td>
        			<td>	
                    	{{$user->EMAIL}}
                    </td>
        			<td>	
                    	{{$user->PASSWORD}}
                    </td>
        			<td>	
                    	{{$user->FIRSTNAME}}
                    </td> 
        			<td>	
                    	{{$user->LASTNAME}}
                    </td>
        			<td>	
                    	{{$user->RIGHTS}}
                    </td>
                    <td>
                    	{{$user->ROLE}}
                    </td>
                    <td>
                        <form action="adminEdit" method="POST" style="display: inline;">
            				<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            				<input type="hidden" name="ID" value="<?php echo $user->ID ?>">

                        	<input type ="image" src="{{ asset('public/images/icons/edit.png') }}" title="Edit" style="vertical-align:middle; display:inline;" width="24" height="24"> 
                     	</form>
                        <form onSubmit="if(!confirm('Are you sure?')){return false;}" id ="delete" action="adminDelete" method="POST" style="display: inline;">
            				<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            				<input type="hidden" name="ID" value="<?php echo $user->ID ?>">
                     	    <input type ="image" src="{{ asset('public/images/icons/delete.png') }}" title="Delete" style="vertical-align:middle; display:inline;" width="24" height="24"> 
                     	</form>

                     	
                    </td>
                </tr>

                @endforeach 
            </table>
     	</div>
    </div>
    

@endsection

</html>