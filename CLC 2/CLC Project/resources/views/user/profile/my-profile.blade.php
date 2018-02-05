
<html>



@extends('layouts.appmaster')
@section('title', 'Home')
@section('content')


    <div class="my-profile">
    <div class="content-container">
    	<h1>Profile</h1>
    
    	<table>

    		<tr>
    			<td>Email: </td> 
    			<td>{{$user->getEmail()}}</td> 
    		</tr>
    		<tr>
    			<td>Password: </td> 
    			<td>{{$user->getPassword()}}</td> 
    		</tr>
    		<tr>
    			<td>First Name: </td> 
    			<td>{{$user->getFirstName()}}</td> 
    		</tr>
    		
    		<tr>
    			<td>Last Name: </td> 
    			<td>{{$user->getLastName()}}</td> 
    		</tr>
    		
    		<tr>
    			<td>Permissions: </td> 
    			<td>{{$user->getRights()}}</td> 
    		</tr>
    		<tr>
    			<td>Role: </td> 
    			<td>{{$user->getRole()}}</td> 
    		</tr>
    	</table>
    </div>
    </div>
    

@endsection

</html>