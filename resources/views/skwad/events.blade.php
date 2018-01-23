@extends('layouts/skwad')
@section('title', 'Dashboard')

@section("content")

<div class="container">
	<div class="row"> 
		@if (isset($gossip['gossip']))
		@foreach($gossip['gossip'] as $key => $value)
			<div class="col-xs-12">
				@include('skwad.partials.gossip', $value)
			</div>
		@endforeach
		@endif
	</div>
</div>

@endsection