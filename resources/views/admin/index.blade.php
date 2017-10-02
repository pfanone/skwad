@extends('layouts/skwad')
@section('title', 'Admin')

@section("content")

<div class="row">
	<div class="col-xs-12">
		<h2>Admin</h2>
	</div>
	<div class="col-xs-12">
		<form role="form" method="POST" action="{{ url('/admin') }}">
			<div class="row">
				<div class="col-xs-12">
					<select name="item_type">
						<option value='news'>News</option>
						<option value='rotisserie'>Rotisserie</option>
						<option value='mission'>Mission</option>
					</select>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection