@extends('layouts.app')
@section('title','Add Category')
@section('content')
	<div class="container">
		<h1 class="text-center">Add New Category</h1>
		@if(Session::has("success_message"))
			<div class="alert alert-success text-center">{{Session::get("success_message")}}</div>
		@endif
		<hr>
		<div class="container">
			<div class="row text-danger">
				@if(count($errors) > 0)
					@foreach($errors->all() as $error)
					<p>{{$error}}</p>
					@endforeach
				@endif
			</div>
		</div>

		<form action="" method="POST">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="form-group">
						<label for="name">Category:</label>
						<input type="text" name="name" class="form-control" id="name">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Add New Category</button>
					
				</div>
				</div>
		</form> {{-- end form --}}

	</div>
@endsection