
<html>



@extends('layouts.appmaster')
@section('title', 'Home')
@section('content')


    
    <div class="content-container">
    <div class="admin-panel">
    		<h1>Admin Panel</h1>
    		<div>Edit data for user: {{$user->EMAIL}}</div>
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
    		
    		
				
    		<form action="adminSave" method="POST" style="display: inline;">
            	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            	<input type="hidden" name="id" value="<?php echo $user->ID ?>">
      	
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
    
    				
        			<tr>
        			    <td>	
                        	{{$user->ID}}
                        	<input type="hidden" name="ID" value="{{$user->ID}}" />
                        	
                        	
                        	<input type="hidden" name="OBJECTIVE" value="{{$user->OBJECTIVE}}" />
                        	<input type="hidden" name="EDUCATION_1" value="{{$user->EDUCATION_1}}" />
                        	<input type="hidden" name="EDUCATION_2" value="{{$user->EDUCATION_2}}" />
                        	<input type="hidden" name="EDUCATION_3" value="{{$user->EDUCATION_3}}" />
                        	<input type="hidden" name="SKILLS" value="{{$user->SKILLS}}" />
                        	<input type="hidden" name="EXPERIENCE_1" value="{{$user->EXPERIENCE_1}}" />
                        	<input type="hidden" name="EXPERIENCE_2" value="{{$user->EXPERIENCE_2}}" />
                        	<input type="hidden" name="EXPERIENCE_3" value="{{$user->EXPERIENCE_3}}" />
                        	<input type="hidden" name="REFERENCES" value="{{$user->REFERENCES}}" />
                        	<input type="hidden" name="DATE" value="{{$user->DATE}}" />
                        	
                        </td>
            			<td>	
            				<input type="text" name="EMAIL" value="{{$user->EMAIL}}" />
                        </td>
            			<td>	
            				<input type="text" name="PASSWORD" value="{{$user->PASSWORD}}" />
                        </td>
            			<td>	
            				<input type="text" style= "width: 120px;" name="FIRSTNAME" value="{{$user->FIRSTNAME}}" />
                        </td> 
            			<td>	
                        	<input type="text" style= "width: 120px;" name="LASTNAME" value="{{$user->LASTNAME}}" />
                        </td>
            			<td>	
                        	<input type="text" style= "width: 20px;" name="RIGHTS" value="{{$user->RIGHTS}}" />
                        </td>
                        <td>
   
                        	<select name="ROLE">
                        	<option value="{{$user->ROLE}}">{{$user->ROLE}}</option>
                        	<option value="None">None</option>
                              <option value="Business Owner">Business Owner</option>
                              <option value="Employer">Employer</option>
                              <option value="Employee">Employee</option>
                              <option value="Student">Student</option>
                            </select>
                        	
                        </td>
                        <td>
 
                        	<input type ="image" src="{{ asset('public/images/icons/save.png') }}" title="Save" style="vertical-align:middle; display:inline;" width="24" height="24"> 
                   
                        </td>
                    </tr>
    
                </table>
                <br>
                <div><a href="{{route('admin')}}">Back to admin panel</a></div>
            </form>
     	</div>
    </div>
    

@endsection

</html>