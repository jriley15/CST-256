<html>

	<div class="header">

  	<div class="title">
    	<a href="{{route('home')}}">iNetwork</a>
    </div>


	<div class="top-right">
	
	 	@if (session('user'))
			@include('navigation.nav-bar')
		@else
			@if (Request::is('home') || Request::is('/'))  
				@include('user.login.login-form-small')
			@else
               <nav>
                    <ul>
                        <li>
                        	<a href="{{route('home')}}">Home</a>
                        </li>	
                    </ul>
               </nav>
            @endif
		
		@endif
		
		
	</div>

	</div>

</html>