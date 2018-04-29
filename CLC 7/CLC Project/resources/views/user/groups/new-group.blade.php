
<html>



@extends('layouts.appmaster')
@section('title', 'Job')
@section('content')


    <div class="my-profile">
    <div class="content-container">
    <div class="job">
    	<h1>Create Group</h1>
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
    	<form action="createGroup" method="POST">
    	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">	
        	<table>
    
        		<tr>
        			<td><b>Title: </b></td> 
        			<td><input type="text" name="TITLE" value="" /></td>
        		</tr>
        		<tr>
        			<td><b>Description: </b></td> 
        			<td><textarea name="DESCRIPTION" maxlength="500"></textarea></td> 
        		</tr>	
        		
        	</table>
        	<input type="submit" value="Submit" />
        	
        	
    	</form>
    	<a href="{{route('groups')}}">Back</a>
    		
    	</div>	
    </div>
    </div>
    

@endsection

</html>