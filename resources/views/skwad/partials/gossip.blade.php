<div class="gossip_card marginT20">
	<div class="gossip_card_sub">
		<div class="row margin10">
			<div class="col-xs-12">
				<h3><span class="green-text"><strong>{{ ucwords($type) }}</strong></span>&nbsp;/&nbsp;&nbsp;{{ $title }}</h3>
			</div>
			<div class="col-xs-12">
				<h4>{!! $description !!}</h4>
			</div>
			<div class="col-xs-12 text-right">
				<p><em>Posted: {{ $posted_date }}</em></p>
			</div>
		</div>
	</div>
	<div class="gossip_card_image" style='background-image: url("{{ $image_url }}");background-size: cover;'>&nbsp;</div>
</div>