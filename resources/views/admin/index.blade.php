@extends('layouts/skwad')
@section('title', 'Admin')

@section("content")

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h2>SKWAD CMS</h2>
		</div>
		<div class="col-xs-12">
			<form role="form" method="POST" action="{{ url('/admin') }}">
				{{ csrf_field() }}
					<div class="form-group">
						<label for="item_type">Description</label>
						<select name="item_type">
							<option value='news'>News</option>
							<option value='rotisserie'>Rotisserie</option>
							<option value='mission'>Mission</option>
						</select>
					</div>
					<div class="form-group">
						<label for="item_header">Title</label>
						<input type="text" name="item_header" class="form-control">
					</div>
					<div class="form-group">
						<label for="item_description">Description</label>
						<textarea name="item_description"></textarea>
					</div>
					<div class="col-xs-12 marginT10">
					</div>
					<div class="col-xs-12 marginT10">
						<button type="submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection