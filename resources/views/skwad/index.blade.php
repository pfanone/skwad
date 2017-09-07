@extends('layouts/skwad')
@section('title', '-')

@section("content")

<div class="header_div blackBG">
	<div class="row">
		<div class="col-xs-12 col-sm-3">
			<div class="digital-clock">00:00:00</div>
		</div>

		<div class="col-xs-12 col-sm-6">
			<p class="marginT10 marginL10"><img src="{{ url('/images/skwad_logo.png') }}" height="102" width="136"></p>
		</div>
		
		<div class="col-xs-12 col-sm-3">
			<h2 class="marginT40">Total Points: {{ $total_points }}</h2>
		</div>
		
	</div>
</div>

<div class="container-fluid">
<div class="main_section row">
	<div class="col-xs-12 col-sm-5 section_div">
		<div class="row">
			<div class="col-xs-12 section_div_top_half purpleBG">
			@foreach($core_values as $key => $value)
				<p>{{ $value }}</p>
			@endforeach
			</div>
			<div class="col-xs-12 section_div_bottom_half darkblueBG">
			@foreach($daily_targets as $key => $value)
				<p>{{ $value }}</p>
			@endforeach
			</div>
		</div>
	</div>
	<div id="gossip_section" class="col-xs-12 col-sm-7 section_div">
		<div class="carousel slide" id="gossip_carousel-generic" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
			@foreach($gossip as $key => $value)
				<div class="item @if($key == 0) active @endif">
					@include('skwad.partials.gossip', $value)
				</div>
			@endforeach
			</div>
		</div>
		<script type="text/javascript">
			$('.carousel').carousel();
		</script>
	</div>
</div>
</div>

<div class="footer_div blackBG">
	<p class="pad20">Unsalted Tortilla Chips Best Cure For Colds Says Health Nut</p>
	
	<div class="ticker-wrap">
		<div class="ticker">
			@foreach($news as $key => $news_item)
			<div class="ticker__item">{{ $news_item }}</div>
			@endforeach
		</div>
	</div>	
</div>

<script type="text/javascript">
$(document).ready(function() {
	clockUpdate();
	setInterval(clockUpdate, 1000);
})

function clockUpdate() {
	var date = new Date();
	// $('.digital-clock').css({'color': '#fff', 'text-shadow': '0 0 6px #62BBC1'});

	function addZero(x) {
		if (x < 10) {
			return x = '0' + x;
		} else {
			return x;
		}
	}

	function twelveHour(x) {
		if (x > 12) {
			return x = x - 12;
		} else if (x == 0) {
			return x = 12;
		} else {
			return x;
		}
	}

	var h = addZero(twelveHour(date.getHours()));
	var m = addZero(date.getMinutes());
	var s = addZero(date.getSeconds());

	$('.digital-clock').text(h + ':' + m + ':' + s);
}
</script>

@endsection