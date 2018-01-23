@extends('layouts/skwad')
@section('title', 'Dashboard')

@section("content")

<div class="container main_section_container">
	<div class="main_section row">
		<div class="col-xs-12">
			<div id="gossip_section" class="section_div">
				<div class="carousel slide" id="gossip_carousel_generic" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
					@if (isset($gossip['gossip']))
					@foreach($gossip['gossip'] as $key => $value)
						@if($key == 0)
						<div class="item active">
						@else
						<div class="item">
						@endif
							@include('skwad.partials.gossip', $value)
						</div>
					@endforeach
					@endif
					</div>
				</div>
				<p style="position: absolute;bottom: 0px;left: 40px;"><a href="/events">View All Updates</a></p>
				<script type="text/javascript">
					$('#gossip_carousel_generic').carousel({interval: 1000 * 10});
				</script>
			</div>
			
			<div class="section_div horizontal_divider marginT20">&nbsp;</div>

			<div id="sales_div" class="section_div marginT20">
				<div class="section_div_header">
					<p>Sales</p>
				</div>
				<div class="section_div_body">
					<p class="subheader">Today</p>
					<h1 class="purple-text text-center"><strong>{{ $stats['sales_today'] }}</strong></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="main_section row marginT20">
		<div class="col-xs-12">
			<div id="rotisserie_section" class="section_div">
				<div class="section_div_header">
					<p>Rotisserie</p>
				</div>
				<div class="section_div_body" style="padding-top: 0px;">
					<div class="carousel slide" id="rotisserie_carousel_generic" data-ride="carousel">
						<div class="carousel-inner" role="listbox">
						@if (isset($gossip['rotisserie']))
						@foreach($gossip['rotisserie'] as $key => $value)
							@if($key == 0)
							<div class="item active">
							@else
							<div class="item">
							@endif
								@include('skwad.partials.rotisserie', $value)
							</div>
						@endforeach
						@endif
						</div>
					</div>
					<script type="text/javascript">
						$('#rotisserie_carousel_generic').carousel({interval: 1000 * 10});
					</script>
				</div>
			</div>

			<div id="mission_section" class="section_div">
				<div class="section_div_header">
					<p>Mission</p>
				</div>
				<div class="section_div_body">
					<div class="carousel slide" id="mission_carousel_generic" data-ride="carousel">
						<div class="carousel-inner" role="listbox">
						@if (isset($gossip['mission']))
						@foreach($gossip['mission'] as $key => $value)
							@if($key == 0)
							<div class="item active">
							@else
							<div class="item">
							@endif
								@include('skwad.partials.mission', $value)
							</div>
						@endforeach
						@endif
						</div>
					</div>
					<script type="text/javascript">
						$('#mission_carousel_generic').carousel({interval: 1000 * 10});
					</script>
				</div>
			</div>

			<div class="section_div horizontal_divider">&nbsp;</div>

			<div id="sales_div" class="section_div">
				<div class="section_div_header">
					<p>Orders Picked</p>
				</div>
				<div class="section_div_body">
					<p class="subheader">Today</p>
					<h1 class="purple-text text-center"><strong>{{ $stats['orders_picked'] }}</strong></h1>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection