@extends('layouts.app')
@section('title','Items')
@section('content')
	<div class="container">
		<h4 class="text-center py-3">Items</h4>
		<div class="row">
			<div class="col-sm-12">
				@if(Session::has('cart'))
					<table class="table table-striped">
						<thead>
							<th>Item</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Deposit</th>
							<th>Subtotal</th>
							<th style="border-right: 5px solid  #c3a663 !important;">Action</th>
						</thead>
						<tbody>
							@foreach($item_cart as $item)
								<tr>
									<td>{{$item->name}}</td>
									<td>
										<form method="POST" action="/menu/mycart/{{$item->id}}/changeQty">
											{{csrf_field()}}
											{{method_field("PATCH")}}
											<div class="input-group">
												<input type="number" name="new_qty" value="{{$item->quantity}}" min="1" max="{{$item->available}}" style="width: 100px;">
												<div class="input-group-append">
													<button type="submit" class="btn btn-OK">Update Quantity</button>
												</div>
											</div>
										</form>
									</td>
									<td>{{$item->price}}</td>
									<td>{{$item->deposit}}</td>
									<td>{{$item->subtotal}}</td>
									<td  style="border-right: 5px solid  #c3a663 !important;">
										<form action="/menu/mycart/{{$item->id}}/delete" method="POST">
											{{csrf_field()}}
											{{method_field("DELETE")}}
											<button class="btn btn-danger" type="submit">Remove</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<th colspan="12" class="text-center">Total: {{$total}}</th>			
						</tfoot>
					</table>
					<div class="text-center mb-3">
						<a href="/menu/borrow" class="btn btn-OK p-2">Checkout</a>
						<a href="/menu/clearcart" class="btn btn-NG p-2"> Clear Cart</a>
					</div>
				@else
					<div class="col-sm-12 text-center">
						<div class="card" style="border: 3px solid #c3a663;">
		                    <div class="card-header" style="background-color: #2f2f2f; color: #c3a663;">
		                    	<h5 class="">Your cart is empty</h5>
		                    </div>

		                    <div class="card-body " style="background-color:  #464a49;">
		     					<a class="btn btn-block btn-OK" href="/gallery">Go back to gallery</a>
		                    </div>
		                </div>					
					</div>
				@endif

				{{-- <a href="/gallery" class="btn btn-block btn-primary btn-OK">Go back to gallery</a> --}}
				
			</div>
			
		</div>
	</div>
@endsection