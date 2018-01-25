
<html>
<title>Login</title>
<form action = "doLogin" method = "POST">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
<h2>Login</h2>
		<table>
			<tr>
				<td>Email Address: </td>
				<td><input type = "text" name = "email" /></td>
			</tr>
    
			<tr>
				<td>Password: </td>
				<td><input type = "password" name = "password" /></td>
			</tr>
			
			<tr>
				<td colspan = "2" align = "center">
					<input type = "submit" value = "Login" />
				</td>
			</tr>
		</table>
	</form>
	    	<tr>
				<td> <a href="{{route('register')}}">Register Here</a></td>
			</tr>
    
</html>