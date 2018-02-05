
<html>




   <nav>
        <ul>
            <li>
            	
            	
            	<a href="{{route('myProfile')}}">{{session('user')->getEmail()}}</a>
            </li>
            
            @if (session('user')->getRights() > 0) 
             <li>
            	<a href="{{route('admin')}}">Admin</a>
            
             </li>
            @endif

            <li>
            	<a href="{{route('home')}}">Home</a>
            </li>
            

            <li>
            	<a href="{{route('logout')}}">Sign Out</a>
            </li>
       </ul>
        
    </nav>





</html>