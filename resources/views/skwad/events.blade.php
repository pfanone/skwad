@extends('layouts/skwad')
@section('title', 'Dashboard')

@section("content")

<div class="header_div">
	<div class="row marginT10 text-center">
		<div class="col-xs-12 col-sm-3 col-md-4 marginT20">
			<h3><span class="digital-clock">00:00:00</span> {{ date('l jS, F') }}</h3>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-2 col-md-offset-1">
			<img src="{{ url('/images/skwad_logo.png') }}" class="skwad-logo img-responsive marginT20">
		</div>

		<div class="col-xs-12 col-sm-3 col-md-3 col-md-offset-2 marginT20">
			<h3 class="point_text"><strong>{{ $total_points }}</strong> Points</h3>
		</div>
		
	</div>
</div>

<div class="container main_section_container">
	<div class="row">

		<div class="col-xs-12 pull-right">
			<p><a href="/">Main</a></p>
		</div>

		<div class="col-xs-12 text-center">
			<h1>Updates</h1>
		</div>

		@if (isset($events['gossip']))
			@foreach($events['gossip'] as $key => $value)
				<div class="col-xs-12">
					@include('skwad.partials.gossip', $value)
				</div>
			@endforeach
		@else
			<div class="col-xs-12">
				<p>No Events!</p>
			</div>
		@endif
	</div>
</div>

@endsection