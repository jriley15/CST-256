
<html>
<title>Register</title>
<form action = "doRegister" method = "POST">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
<h2>Register</h2>
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
				<td>Confirm Password: </td>
				<td><input type = "password" name = "password2" /></td>
			</tr>
			
			<tr>
				<td>First Name: </td>
				<td><input type = "text" name = "firstName" /></td>
			</tr>
			<tr>
				<td>Last Name: </td>
				<td><input type = "text" name = "lastName" /></td>
			</tr>
			
						<tr>
				<td colspan = "2" align = "center">
					<input type = "submit" value = "Register" />
				</td>
			</tr>
			
		</table>
	</form>
	    	<tr>
				<td> <a href="{{route('login')}}">Login Here</a></td>
			</tr>
    
</html>