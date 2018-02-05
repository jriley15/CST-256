
<html>



@extends('layouts.appmaster')
@section('title', 'Home')
@section('content')


    
    
    
    	@if (session('user'))

			

			<div class="content-container">
				<h1>Feed</h1>
			      @for ($i =0; $i <= 100; $i++)
                    <div class="content-element-center">
    					center element {{$i}}
    				</div>
                  @endfor  
			

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