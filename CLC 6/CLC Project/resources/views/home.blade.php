
<html>



@extends('layouts.appmaster')
@section('title', 'Home')
@section('content')


    
    
    
    	@if (session('user'))

			

			<div class="content-container">
				<h1>Welcome</h1>
			         <div class="content-element-center">
    					Navigate through the website using the links in the top right
    				</div>
			

			</div>
				
		@else
			
			
			<div class="left">
			
				<h1>Welcome</h1>
				
				<div>
					Test
				</div>
			
				
			</div>
			<div class="right">
			
				<h1>Create Account</h1>
                @include('user.register.register-form-module')
				
			</div>
			
		
		@endif

@endsection

</html>