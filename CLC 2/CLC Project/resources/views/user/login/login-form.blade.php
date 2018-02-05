<html>


@extends('layouts.appmaster')
@section('title', 'Login Page')
@section('content')


<div class="content-container">

<form action="doLogin" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
	<h2>Login</h2>
	@if(isset($error))
		<div style="color: red">
    		Error: {{ $error }} <br>
    		<br>
    	</div>
    @endif	
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
			<br>
			<td colspan="2" align="center"><input type="submit" value="Login" />
			</td>
		</tr>
	</table>
</form>

	Not Registered? <a href="{{route('register')}}">Create Account Here</a>


@endsection

</div>
</html>