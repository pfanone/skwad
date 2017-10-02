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
					<label for="item_type">Type</label>
					<select name="item_type" class="form-control">
						<option value='news'>News</option>
						<option value='event'>Event</option>
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
					<textarea name="item_description" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="upload_item_image" >Upload a screenshot</label>
					<label class="btn btn-block btn-file marginT10">
						<input name='upload_item_image' type="file" accept=".png,.jpg,.jpeg" />
					</label>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection