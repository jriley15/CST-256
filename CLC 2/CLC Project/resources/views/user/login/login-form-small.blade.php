
<html>



<div class="login-form-small">
    <form action="doLogin" method="POST">
    	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    	<table>
    		<tr>
    			<td>
    				Email Address<br>
    				<input type="text" name="email" /><br>
    				
    			</td>
    			<td>
    				Password<br>
    				<input type="password" name="password" />
    			</td>
    			<td>
    			<br>
    				<input type="submit" value="Login" />
    			</td>
    		</tr>
            <tr>
            	<td> 
            		<a href="{{route('register')}}">Register Here</a>
            	</td>
            </tr>
    	</table>
    </form>
</div>


</html>