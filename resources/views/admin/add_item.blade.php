@extends('layouts.app')
@section('title','Add Item')
@section('content')
	<div class="container">
		<h4 class="text-center py-3">Add New Item</h4>
		<div class="container">
			<div class="row text-danger">
				@if(count($errors) > 0)
					@foreach($errors->all() as $error)
					<p>{{$error}}</p>
					@endforeach
				@endif
			</div>
		</div>

		<form action="" enctype="multipart/form-data" method="POST">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" name="name" class="form-control" id="name">
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea type="text" name="description" class="form-control" id="description" cols="30" rows="8"></textarea>
					</div>
					<div class="form-group">
						<label for="quantity">Quantity:</label>
						<input type="number" name="quantity" class="form-control" id="quantity" min="1">
					</div>
					<div class="form-group">
						<label for="available">Available:</label>
						<input type="number" name="available" class="form-control" id="available" min="0">
					</div>
					<div class="form-group">
						<label for="price">Price:</label>
						<input type="number" name="price" class="form-control" id="price" min="1">
					</div>
					<div class="form-group">
						<label for="deposit">Deposit:</label>
						<input type="number" name="deposit" class="form-control" id="deposit" min="1">
					</div>	
					<div class="form-group">
						<label for="category">Categories:</label>
						<select name="category" id="category" class="form-control">
							@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="image">Upload Image:</label>
						<input type="file" name="image" class="form-control" id="image">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Add New Item</button>
					
				</div>
				</div>
		</form> {{-- end form --}}

	</div>
@endsection