@extends('layouts.app')
@section('title','Admin Order Details')
@section('content')
		<div class="container">
			<h4 class="text-center py-3">Admin Orders Details</h4>
			<div class="row">
				<div class="col-sm-8 offset-sm-2">
					<table class="table table-responsive table-striped">
						<thead>
							<tr class="text-center">
								<th>Borrowers Name</th>
								<th>Transaction Code</th>
								<th>Time</th>
								<th>Total</th>
								<th>Details</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr>
								<td>{{$order->user->firstname ." ".$order->user->lastname}}</td>
								<td>{{$order->transaction_code}}</td>
								<td>{{$order->created_at->diffForHumans() }} </td>
								<td>{{number_format($order->total,2,".","," )}} </td>
								<td>{{$order->status->name}}</td>
								<td>
									<div class="row">
										@if($order->status->name == "borrowed")
											<a href="/admin/orders/reject/{{$order->id}}" class="btn btn-danger">Reject</a>
											<a href="/admin/orders/approve/{{$order->id}}" class="btn btn-success">Approve</a>
										@elseif($order->status->name == "returned")
											<a href="/admin/orders/confirm/{{$order->id}}" class="btn btn-success">Confirm</a>
										@endif
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>

					</table>
				</div>
			</div>
		</div> 




@endsection