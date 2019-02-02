@extends('layouts.app')
@section('title','Borrowed Item')
@section('content')
{{-- {{$user}} --}}
	<div class="container">
		<h1 class="text-center">Borrowed Item(s)</h1>
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

			<div class="text-center">
				<h2>User Information</h2>
				<p><i><span class="text-danger">*</span>Please make sure that the following details are correct.</i></p>
				<br>
				<p>Full Name: {{Auth::user()->firstname ." ". Auth::user()->lastname}}</p>
				<p>Address: {{Auth::user()->address}}</p>
				<p>Email: {{Auth::user()->email}}</p>
				
			</div>

			<div class="text-center">
				<form action="" method="POST">
					{{csrf_field()}}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row mb-0 text-center">
								<div class="col-md-6 offset-md-4">
									<a href="/menu/borrow/checkout" class="btn btn-success">Reserve</a>
									<a href="/menu/mycart" class="btn btn-danger">Cancel</a>
								</div>
							</div>
						</div>
						</div>
				</form> {{-- end form --}}
				
			</div>

	
		</div>

	</div>

@endsection