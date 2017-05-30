<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<LINK REL="SHORTCUT ICON" HREF="/images/favicon.ico">
	<title>SKWAD Rewards @yield('title')</title>
	<link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	{{ HTML::style('/css/bootstrap.css') }}
	{{ HTML::style('/css/helper-classes.css') }}
	{{ HTML::style('/css/skwad.css') }}
	{{ HTML::script('/js/jquery-3.1.1.min.js') }}
	{{ HTML::script('/js/bootstrap.min.js') }}

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta http-equiv="refresh" content="180"/>

	<!-- Scripts -->
	<script>
		$_token = "{{ csrf_token() }}";
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>
</head>

<body>
	@include('home.status')
	@yield('content')
</body>
</html>