@extends('layouts.app')
@section('title','Item Details')
@section('content')
	<div class="container">
		{{-- {{dd($item)}} --}}
		<h1 class="text-center my-3">Item Details</h1>
		<hr>
		@if(Session::has("edit_message"))
			<div class="alert alert-success">{{Session::get("edit_message")}}</div>
		@endif
		<div class="row">
			<div class="col-sm-12 text-center">
				<img class="img-fluid d-block" src="/{{$item->image_path}}" style="height: 400px">
			</div>

			<div class="col-sm-8">
				<div class="card" style="height: 400px">
					<div class="card-body">
						<h2 class="card-title">Item Name: {{$item->name}}</h2>
						<p>Item Description: {{$item->description}}</p>
						<p>Item Price: {{$item->price}}</p>
						<p>Item Deposit: {{$item->deposit}}</p>
						<a href="/menu/{{$item->id}}/edit" class="btn-primary btn mx-2">Edit</a>
						<button class="btn btn-danger mx-2" data-toggle="modal" data-target="#confirmDelete">Delete</button>
					</div>

				</div>
				{{-- delete modal --}}
				<div class="modal fade" id="confirmDelete" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4>Confirm Delete</h4>
							</div>
							<div class="modal-body">
								<p>Are you sure you want to delete this item?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
								<form method="POST" action="/menu/{{$item->id}}/delete">
									{{csrf_field()}}
									{{method_field("DELETE")}}
									<button type="submit" class="btn btn-danger">Confirm</button>
									
								</form>

							</div>
						</div>
					</div>
				</div> {{-- end delete modal --}}
			</div>

			<div  class="col-sm-4">
{{-- 				<form method="POST" action="/addToCart/{{$indiv_item->id}}">
					{{csrf_field()}}
					<div class="">
						<input type="number" name="quantity" title="Add Quantity" min="0" value="1" style="width: 100px">
						<button type="submit"  title="Add to Cart">🛒</button>
					</div>
				</form> --}}
{{-- 			<form action="" method="POST">
				{{csrf_field()}}
				<div class="row">
					<div id="booking" class="col-sm-12">
						<div class="form-group">
							<div class="guests">
								<label for="guests">Number of Guests</label><br/>
								<button class="counter-btn" type="button" id="cnt-down">-</button>
									<input type="text" id="guestNo" name="guests" value="2"/>
								<button class="counter-btn" type="button" id="cnt-up">+</button>
							</div>
						</div>
						<div class="form-group">
							<div class="dates">
								<div class="arrival">
									<label for="arrival">ARRIVAL</label><br/>
									<input name="arrival" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="30/01/2019"/>
								</div>
								<div class="departure">
									<label for="arrival">DEPARTURE</label><br/>
									<input name="departure" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="30/01/2019"/>
								</div>
							</div>
						</div>
						<a href="/booking" class="btn btn-success">Reserve Now</a>
					</div>
				</div>
			</form>  --}}{{-- end form --}}
				
			</div>

		</div>
	</div>

	<script>
		$(document).ready(function() {

		var guestAmount = $('#guestNo');

		$('#cnt-up').click(function() {
		guestAmount.val(Math.min(parseInt($('#guestNo').val()) + 1, 20));
		});
		$('#cnt-down').click(function() {
		guestAmount.val(Math.max(parseInt($('#guestNo').val()) - 1, 1));
		});

		// $('.btn').click(function() {

		// var $btn = $('.btn');

		// $btn.toggleClass('booked');
		// $('form').slideToggle(300);

		// if ($btn.text() === "BOOK NOW") {
		//   $btn.text("BOOKED!");
		// } else {
		//   $btn.text("BOOK NOW");
		// }
		// });
		// });
	</script>
@endsection

