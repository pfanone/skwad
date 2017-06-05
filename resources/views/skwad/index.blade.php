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
			<div class="col-xs-12 section_div_top_half purpleBG padL40">
				<h3>Today's Sales</h3>
				<p class="bigText platinumText">{{ $sales_today }}</p>
			</div>
			<div class="col-xs-12 section_div_bottom_half darkblueBG padL40">
				<h3>Orders Picked Today</h3>
				<p class="bigText platinumText">{{ $orders_picked }}</p>
			</div>
		</div>
	</div>
	<div id="gossip_section" class="col-xs-12 col-sm-7 section_div">
		<div class="bs-example" data-example-id="simple-carousel">
			<div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
				@foreach($gossip as $key => $value)
					<div class="item">
						@include('skwad.partials.gossip', $value)
					</div>
				@endforeach
				</div>
				<a href="#carousel-example-generic" class="left carousel-control" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a href="#carousel-example-generic" class="right carousel-control" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<script type="text/javascript">
			$('.carousel').carousel();
		</script>
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