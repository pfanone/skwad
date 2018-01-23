@extends('layouts/skwad')
@section('title', 'Dashboard')

@section("content")

<div class="container">
	<div class="row">

		<div class="col-xs-12">
			<h3>Events</h3>
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