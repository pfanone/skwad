@extends('layouts/skwad')
@section('title', '-')

@section("content")

<div class="header_div blackBG">
	<div class="row">
		<div class="col-xs-12 col-sm-9">
			<p class="marginT10 marginL10"><img src="{{ url('/images/skwad_logo_export.png') }}" height="102" width="136"></p>
		</div>
		<div class="col-xs-12 col-sm-3">
			<div class="digital-clock">00:00:00</div>
		</div>
	</div>
</div>

<div class="main_section row">
	<div class="col-xs-12 col-sm-5 section_div">
		<div class="row">
			<div class="col-xs-12 section_div_top_half purpleBG">
				<h3 class="pad20">Today's Sales: ${{ $sales_today }}</h3>
			</div>
			<div class="col-xs-12 section_div_bottom_half darkblueBG">
				<p class="pad20">Timmy Falls Down Well, Climbing Needs Work</p>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-7 section_div">
		<p class="pad20">Is Kitty Kibble Shortage A Hoax? Sims Search For Truth</p>
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