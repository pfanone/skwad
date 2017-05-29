@if (!is_null(\Session::get('status_success')))
<div class="alert alert-success alert-dismissible" role="alert" aria-live="rude" aria-atomic="true">
	<a class="close" data-dismiss="alert" href="#" aria-label="Close Dialog">×</a>
	<h4><strong>Success!</strong></h4>
	@if (is_array(\Session::get('status_success')))
		<ul>
		@foreach (\Session::get('status_success') as $success)
			<li>{!! $success !!}</li>
		@endforeach
		</ul>
	@else
		{!! \Session::get('status_success') !!}
	@endif
</div>
@endif