@extends('layouts.app')
@section('title','User Profile')
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
				<div class="card">
					<div class="card-header text-center" style="background-color: #2f2f2f; color: #c3a663;">
						<h4>User Profile</h4>
					</div>

					<div class="card-body" style="background-color:  #464a49;">
						{{-- <form method="POST" action=""> --}}
						<form method="POST" action="/myprofile/{{$user->id}}">
							{{csrf_field()}}
							{{method_field("PATCH")}}
								@if(Session::has("edit_message"))
									<div class="alert alert-success text-center">{{Session::get("edit_message")}}</div>
								@endif

							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

								<div class="col-md-6">
									<input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ $user->firstname }}" required autofocus>

									@if ($errors->has('firstname'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('firstname') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

								<div class="col-md-6">
									<input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ $user->lastname }}" required autofocus>

									@if ($errors->has('lastname'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('lastname') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

								<div class="col-md-6">
									<input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $user->address }}" required autofocus>

									@if ($errors->has('address'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('address') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

								<div class="col-md-6">
									<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

									@if ($errors->has('email'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row mb-0 text-center">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-OK">Update Profile</button>
								</div>
							</div>
							
							{{-- <button type="button" class="btn" onclick="myFunction()">try</button>
							<input id="firstname_out"></input>
							<input id="lastname_out"></input>
							<input id="address_out"></input> --}}
							{{-- <input id="email_out"></input> --}}

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		// function myFunction() {
		// var firstname = document.getElementById("firstname").value;
		// var lastname = document.getElementById("lastname").value;
		// var address = document.getElementById("address").value;
		// var email = document.getElementById("email").value;
			// document.getElementById("firstname_out").value = firstname;
			// document.getElementById("lastname_out").value = lastname;
			// document.getElementById("address_out").value = address;
			// document.getElementById("email_out").value = email;
		// }

	</script>
@endsection

