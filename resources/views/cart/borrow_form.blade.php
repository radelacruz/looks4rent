@extends('layouts.app')
@section('title','Borrow Form')
@section('content')
{{-- {{$user}} --}}
	<div class="container">
		<h1 class="text-center">Checkout Page</h1>
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
		{{-- {{$order}} --}}

		<div>
			<h2 class="text-center">Borrowed Item(s)</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Item</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Deposit</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
					@foreach($item_cart as $item)
						<tr>
							<td>{{$item->name}}</td>
							<td>{{$item->quantity}}</td>
							<td>{{$item->price}}</td>
							<td>{{$item->deposit}}</td>
							<td>{{$item->subtotal}}</td>
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr class="text-center">
						<th colspan="12">Total: {{$total}}</th>
					</tr>
					
				</tfoot>
			</table>			
		</div>

		<hr>

		<div>
			<h2 class="text-center">Borrowing Form</h2>
			<form action="" method="POST">
				{{csrf_field()}}
				<div class="row">
					<div class="col-md-12">
						{{-- <div class="form-group row">
							<label for="category" class="col-md-4 col-form-label text-md-right">Title:</label>
							<div class="col-md-6">
								<select name="category" id="category" class="">
									<option>Ms.</option>
									<option>Mr.</option>
									<option>Mrs.</option>
								</select>
								
							</div>
						</div> --}}

{{-- 						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

							<div class="col-md-6">
							<input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ Auth::user()->firstname }}" required autofocus>
							</div>
						</div>

						<div class="form-group row">
							<label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

							<div class="col-md-6">
							<input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ Auth::user()->lastname }}" required autofocus>

							</div>
						</div>

						<div class="form-group row">
							<label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

							<div class="col-md-6">
							<input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ Auth::user()->address }}" required autofocus>

							</div>
						</div>

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

							<div class="col-md-6">
							<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>
								<i><small><span class="text-danger">*</span>Confirmation email goes to this address</small></i>
							</div>
						</div> --}}

						<div class="form-group row">
							<label for="startdate" class="col-md-4 col-form-label text-md-right">{{ __('Borrowed Date') }} <span title="Should be in this format: yyyy-mm-dd">&#10067;</span></label>

							<div class="col-md-6">
							<input id="startdate" type="startdate" class="form-control{{ $errors->has('startdate') ? ' is-invalid' : '' }}" name="startdate"  placeholder="yyyy-mm-dd" required>
								<i><small><span class="text-danger">*</span>Item can be borrowed for 7 days upon received</small></i>
							</div>
						</div>

						{{-- <div class="form-group row">
							<label for="startdate" class="col-md-4 col-form-label text-md-right">{{ __('Borrowed Date') }} <span title="Should be in this format: yyyy/mm/dd">&#10067;</span></label>

							<div class="col-md-6">
								<div class="input-group date" id="datetimepicker3">
									<input id="startdate" type="text" class="form-control{{ $errors->has('startdate') ? ' is-invalid' : '' }}" name="startdate"required>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-time"></span>
									</span>
								</div>
							</div>
						</div> --}}
						<div class="form-group row">
							<label for="requests" class="col-md-4 col-form-label text-md-right">Other Requests:</label>
							<div class="col-md-6">
								<i><small>Special requests cannot be guaranteed–but we will do our best to meet your needs. </small></i>
								<textarea name="requests" id="requests" class="" placeholder="Enter your requests here..." cols="60" rows="5"></textarea>
								
							</div>
						</div>
						<div class="form-group row mb-0 text-center">
							<div class="col-md-6 offset-md-4">
{{-- 								<button type="submit" class="btn btn-primary">
								{{ __('Confirm') }}
								</button> --}}
								<a href="/menu/borrow/checkout" class="btn btn-success">Checkout</a>
							</div>
						</div>
						
					</div>
					</div>
			</form> {{-- end form --}}
			
		</div>



		<hr>



	</div>

	{{-- <script type="text/javascript">
		$(function () {
			$('#datetimepicker3').datetimepicker({
			format: 'LT'
			});
		});
	</script> --}}
@endsection