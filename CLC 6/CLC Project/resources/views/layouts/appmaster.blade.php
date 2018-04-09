<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600"
	rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed"
	rel="stylesheet" type="text/css">

<link
	href="{{ URL::asset('public/css/style.css') }}?<?php echo time(); ?>"
	rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>




<title>@yield('title')</title>


</head>
<body>
	@include('layouts.header')

	<div class="content">
		<div align="center">@yield('content')</div>
	</div>
	<br>
	<br>
	<br>
	<br> @include('layouts.footer')
</body>
</html>
