<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<LINK REL="SHORTCUT ICON" HREF="/images/favicon.ico">
	<title>@yield('title') - SKWAD Rewards</title>
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

	<div class="header_div">
		<div class="row marginT10 text-center">
			<div class="col-xs-12 col-sm-3 col-md-4 marginT20">
				<h3><span class="digital-clock">00:00:00</span> {{ date('l jS, F') }}</h3>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-2 col-md-offset-1">
				<img src="{{ url('/images/skwad_logo.png') }}" class="skwad-logo img-responsive marginT20">
			</div>

			<div class="col-xs-12 col-sm-3 col-md-3 col-md-offset-2 marginT20">
				<h3 class="point_text"><strong>{{ $total_points or 'TBD' }}</strong> Points</h3>
			</div>
			
		</div>
	</div>

	@include('home.status')
	@yield('content')

	@if (isset($news))
	<div class="footer_div">
		<div class="ticker-wrap">
			<div class="ticker">
				@foreach($news as $key => $news_item)
				<div class="ticker__item">{{ $news_item }}</div>
				@endforeach
			</div>
		</div>	
	</div>
	@endif

	<script type="text/javascript">
		$(document).ready(function() {
			clockUpdate();
			setInterval(clockUpdate, 1000);
		})

		function clockUpdate() {
			var date = new Date();

			function addZero(x) {
				if (x < 10) return x = '0' + x;
				else return x;
			}

			function twelveHour(x) {
				if (x > 12) return x = x - 12;
				else if (x == 0) return x = 12;
				else return x;
			}

			var h = addZero(twelveHour(date.getHours()));
			var m = addZero(date.getMinutes());
			var s = addZero(date.getSeconds());

			$('.digital-clock').text(h + ':' + m + ':' + s);
		}
	</script>
</body>
</html>