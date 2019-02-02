@extends('layouts.app')
@section('title','Items')
@section('content')
	<div class="container">
		<h1 class="text-center">Items</h1>
			@if(Session::has('cart'))

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Item</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Deposit</th>
							<th>Subtotal</th>
							<th>Action</th>
						</tr>
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
												<button type="submit" class="btn btn-outline-primary">Update Quantity</button>
											</div>
										</div>
									</form>
								</td>
								<td>{{$item->price}}</td>
								<td>{{$item->deposit}}</td>
								<td>{{$item->subtotal}}</td>
								<td>
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
						<tr class="text-center">
							<th colspan="12">Total: {{$total}}</th>
						</tr>
						
					</tfoot>
				</table>
				<div class="text-center mb-3">
					<a href="/menu/borrow" class="btn btn-success">Checkout</a>
					<a href="/menu/clearcart" class="btn btn-outline-danger"> Clear Cart</a>
				</div>
			@else
				<h2>Cart is empty.</h2>
			@endif

			<a href="/gallery" class="btn btn-block btn-primary">Go back to gallery</a>
		
	</div>


@endsection