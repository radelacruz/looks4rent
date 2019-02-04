@extends('layouts.app')
@section('title','Borrowed Item Details')
@section('content')
{{-- {{$user}} --}}
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
		<div class="row">
			<div class="col-md-6">
				<h4 class="text-center py-3">Borrowed Item Details</h4>
				{{-- <hr> --}}
				{{-- {{$order}} --}}
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Item</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Deposit</th>
							<th style="border-right: 5px solid  #c3a663 !important;">Subtotal</th>
						</tr>
					</thead>
					<tbody>
						@foreach($item_cart as $item)
							<tr>
								<td>{{$item->name}}</td>
								<td>{{$item->quantity}}</td>
								<td>{{$item->price}}</td>
								<td>{{$item->deposit}}</td>
								<td style="border-right: 5px solid  #c3a663 !important;">{{$item->subtotal}}</td>
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
			<div class="col-md-6">		
				<div class="orderDetails">

					<div class="text-center">
						<h4 class="text-center py-3">Date</h4>
						<p><i><span class="text-danger">*</span>Please select start date and end date</i></p>
						<br>
						{{-- <form method="GET"> --}}
							<div class="form-group row">
								<label for="startDate" class="col-md-4 col-form-label text-md-right">Start Date:</label>
								<div class="col-md-6">
									<input type="date" id="startDate" style="border:1px solid #c3a663; background-color: #f1d491;" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" required autofocus  disabled>
									{{-- <span class="" id="start_date"></span> --}}
								</div>
							</div>
							<div class="form-group row">
								<label for="endDate" class="col-md-4 col-form-label text-md-right">End Date:</label>
								<div class="col-md-6">
									<input type="date" id="endDate" style="border:1px solid #c3a663; background-color: #f1d491;" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" required autofocus  disabled>
									{{-- <span class="" id="end_date"></span> --}}
								</div>
							</div>
							<button type="button" class="btn" style="background-color: #2f2f2f; color: #c3a663; border: 1px solid #c3a663;" onclick="myFunction()" disabled>
									{{ __('Confirm Date') }}
							</button>
						{{-- </form> --}}


					</div>
			
				</div>
			</div>
			<div class="col-md-12 p-5">
				<div class="text-center">
					
					<form action="" method="POST">
						{{csrf_field()}}
						<div class="row">
							<div class="col-md-12">
								<div class="form-group row mb-0 text-center">
									<div class="col-md-6 offset-md-4">
										<span name="start_date" id="start_date"></span>
										<span name="end_date" id="end_date"></span>

										<a href="/menu/borrow/checkout" class="btn btn-OK m-2">Reserve</a>
										<a href="/menu/mycart" class="btn btn-NG m-2">Cancel</a>
									</div>
								</div>
							</div>
							</div>
					</form> {{-- end form --}}
				</div>
			</div>
		</div>
	</div>

	<script>
		function myFunction() {
		var startDate = document.getElementById("startDate");
		var endDate = document.getElementById("endDate");
		var start_date = startDate.value;
		var end_date = endDate.value;

			if(startDate.value == "" && startDate.value == ""){
				document.getElementById("start_date").style.color = "red";
				document.getElementById("start_date").innerHTML = "Please enter a valid date";
				document.getElementById("end_date").style.color = "red";
				document.getElementById("end_date").innerHTML = "Please enter a valid date";
			} else {
				document.getElementById("start_date").style.color = "";
				document.getElementById("start_date").innerHTML = start_date;
				document.getElementById("end_date").style.color = "";
				document.getElementById("end_date").innerHTML = end_date;
			}
		}

	</script>
@endsection

