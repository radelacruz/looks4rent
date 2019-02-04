@extends('layouts.app')
@section('title','Add Category')
@section('content')
	<div class="container">
		<div class="row text-danger">
			@if(count($errors) > 0)
				@foreach($errors->all() as $error)
				<p>{{$error}}</p>
				@endforeach
			@endif
		</div>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card" style="border: 3px solid #c3a663;">
					<div class="card-header" style="background-color: #2f2f2f; color: #c3a663; border-bottom: 1px solid #c3a663;">
						<h4 class="text-center py-3" >Add New Category</h4>
					</div>
					<div class="card-body" style="background-color:  #464a49;">
						<form action="" method="POST">
							{{csrf_field()}}
							<div class="row">
								<div class="col-lg-8 offset-lg-2">
									<div class="form-group">
										<label for="name" style="color: #c3a663; ">Category:</label>
										@if(Session::has("success_message"))
											<div class="alert alert-success text-center">
												{{Session::get("success_message")}}
											</div>
										@endif
										<input type="text" name="name" class="form-control" id="name" style="border:1px solid #c3a663; background-color: #f1d491;">
									</div>
									<button type="submit" class="btn btn-block"  style="background-color: #2f2f2f; color: #c3a663; border: 1px solid #c3a663;">Add</button>
									
								</div>
								</div>
						</form> {{-- end form --}}
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection