
<html>




<form action="doRegister" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
	<table>
		<tr>
			<td>Email Address:</td>
			<td><input type="text" name="email" /></td>
		</tr>

		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td>Confirm Password:</td>
			<td><input type="password" name="password2" /></td>
		</tr>

		<tr>
			<td>First Name:</td>
			<td><input type="text" name="firstName" /></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><input type="text" name="lastName" /></td>
		</tr>
		<tr>
			<td>Role:</td>
			<td>
                        	<select name="role">
                        	<option value="None">None</option>
                              <option value="Business Owner">Business Owner</option>
                              <option value="Employer">Employer</option>
                              <option value="Employee">Employee</option>
                              <option value="Student">Student</option>
                            </select>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			<br>
			<input type="submit" value="Submit" />
			</td>
		</tr>

	</table>
</form>


</html>