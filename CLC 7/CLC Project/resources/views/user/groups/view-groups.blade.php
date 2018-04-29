
<html>


@extends('layouts.appmaster')
@section('title', 'Groups')





@section('content')

    
    
    <div class="content-container">
    <div class="admin-panel">
    		<h1>Affinity Groups</h1>
    		<div><a href="{{route('newGroup')}}">Create</a> new group</div>
    		<br>
    		<div>Select a group below to view</div>
    	
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
    				Operation
    			</th>

    			@foreach ($groups as $group) 
				
    			<tr>
    			    <td>	
                    	{{$group->getId()}}
                    </td>
        			<td>	
                    	{{$group->getTitle()}}
                    </td>
                    <td>


                		<form action="viewGroup" method="GET"style="margin: 0; vertical-align: center; display: inline;">
                			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                			<input type="hidden" name="ID" value="<?php echo $group->getId() ?>">
                			<input type="submit" value="View" />
                		</form>
                		@if (session('user')->getRights() > 0) 
                			<form action="editGroup" method="GET"style="margin: 0; vertical-align: center; display: inline;">
                    			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    			<input type="hidden" name="ID" value="<?php echo $group->getId() ?>">
                    			<input type="submit" value="Edit" />
                    		</form>
                			<form onSubmit="if(!confirm('Are you sure?')){return false;}" action="deleteGroup" method="POST"style="display: inline; margin: 0; vertical-align: center;">
                    			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    			<input type="hidden" name="ID" value="<?php echo $group->getId() ?>">
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