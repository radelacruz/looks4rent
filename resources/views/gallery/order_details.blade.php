@extends('layouts.app')
@section('title','Order Details')
@section('content')
	<div class="container">
		<h4 class="text-center py-3">Orders Details</h4>
		{{-- <hr> --}}
		<div class="row">
			<div class="col-sm-12   mb-4">
				<form action="/user/orders/search" method="POST" role="search">
					{{ csrf_field() }}
					<div  id="search-border" class="input-group">
						<input id="search" type="text" class="form-control" name="search"
							placeholder="Search...">
							<span class="input-group-btn">
							<button class="btn btn-default-sm" type="submit">
							<i class="fa fa-search"><span class="glyphicon glyphicon-search"></span></i>
							</button>
						</span>
					</div>
				</form>
			</div>
			<div class="col-sm-12">
				<table class="table table-striped">
					<thead>
						<th>Transaction Code</th>
						<th>Time</th>
						<th>Total</th>
						<th>Details</th>
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						@if(isset($details))
							@foreach($details as $order)
								<tr>
									<td>{{ $order->transaction_code }} </td>
									<td>{{ $order->created_at->diffForHumans() }} </td>
									<td>{{ number_format($order->total,2,".","," )}} </td>
									<td>
									 	@foreach($order->accomodations as $item)
											{{$item->name}} : {{$item->pivot->quantity}}
											<br>
										@endforeach
									</td>
									<td> {{$order->status->name}}
									</td>
									<td>
										<div class="row">
											@if($order->status->name == "borrowed")
												<a href="/user/orders/cancel/{{$order->id}}" class="btn btn-danger">Cancel</a>
											@elseif($order->status->name == "approved")
												<a href="/user/orders/return/{{$order->id}}" class="btn btn-success">Return</a>
{{-- 											@elseif($order->status->name == "returned")
												<small>Waiting for confirmation</small> --}}
											@endif
										</div>
									</td>
								</tr>
							@endforeach
						@else						
							<tr>
								<td colspan="6">No Item Found</td>
							</tr>
						@endif
						
					</tbody>
				</table>
			</div>
		</div>
	</div>




@endsection