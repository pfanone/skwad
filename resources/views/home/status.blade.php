@if (isset($errors) && count($errors->all()) > 0)
<div class="alert alert-danger alert-dismissible" role="alert" aria-live="rude" aria-atomic="true">
	<a class="close" data-dismiss="alert" href="#" aria-label="Close Dialog">×</a>
	<h4><strong>Error</strong></h4>
	<ul>
	@foreach ($errors->all('<li>:message</li>') as $message)
	{!! $message !!}
	@endforeach
	</ul>
</div>
@elseif (!is_null(\Session::get('status_error')))
<div class="alert alert-danger alert-dismissible" role="alert" aria-live="rude" aria-atomic="true">
	<a class="close" data-dismiss="alert" href="#" aria-label="Close Dialog">×</a>
	<h4><strong>Error</strong></h4>
	@if (is_array(\Session::get('status_error')))
		<ul>
		@foreach (\Session::get('status_error') as $error)
			<li>{!! $error !!}</li>
		@endforeach
		</ul>
	@else
		{!! \Session::get('status_error') !!}
	@endif
</div>
@endif

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

@if (!is_null(\Session::get('status_warning')))
<div class="alert alert-warning alert-dismissible" role="alert" aria-live="rude" aria-atomic="true">
	<a class="close" data-dismiss="alert" href="#" aria-label="Close Dialog">×</a>
	<h4><strong>Warning</strong></h4>
	@if (is_array(\Session::get('status_warning')))
		<ul>
		@foreach (\Session::get('status_warning') as $success)
			<li>{!! $success !!}</li>
		@endforeach
		</ul>
	@else
		{!! \Session::get('status_warning') !!}
	@endif
</div>
@endif

@if (!is_null(\Session::get('status_info')))
<div class="alert alert-info alert-dismissible" role="alert" aria-live="rude" aria-atomic="true">
	<a class="close" data-dismiss="alert" href="#" aria-label="Close Dialog">×</a>
	<h4><strong>Attention</strong></h4>
	@if (is_array(\Session::get('status_info')))
		<ul>
		@foreach (\Session::get('status_info') as $success)
			<li>{!! $success !!}</li>
		@endforeach
		</ul>
	@else
		{!! \Session::get('status_info') !!}
	@endif
</div>
@endif