@extends('layouts/skwad')
@section('title', 'Admin')

@section("content")

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h2>SKWAD CMS</h2>
		</div>
		<div class="col-xs-12">
			<form role="form" method="POST" action="{{ url('/admin') }}" enctype="multipart/form-data">
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
					<label for="item_title">Title</label>
					<input type="text" name="item_title" class="form-control">
				</div>
				<div class="form-group">
					<label for="item_description">Description</label>
					<textarea name="item_description" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="upload_item_image">Upload a screenshot</label>
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
	<div class="row">
		<div class="col-xs-12">
			<h2>Current Acitve Items</h2>
		</div>
		@foreach($current_items as $ci_key => $ci_val)
		<div class="col-xs-12">
			<table class="table">
				<thead>
					<th>Type</th>
					<th>Title</th>
					<th>Remove</th>
				</thead>
				<tbody>
					@foreach($ci_val as $key => $value)
						<tr>
							<td>{{ $value['type'] }}</td>
							<td>{{ $value['title'] }}</td>
							<td><a href="/admin/delete/{{ $value['item_id'] }}" class="btn btn-default">remove</button></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@endforeach
	</div>
</div>

@endsection