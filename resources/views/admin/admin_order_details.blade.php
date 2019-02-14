@extends('layouts.app')
@section('title','Admin Order Details')
@section('content')
	<div class="container">
		<h4 class="text-center py-3">Admin Order Details</h4>
		<hr>
		<div class="row">
			<div class="col-sm-12 mb-4">
				<form action="/admin/orders/search" method="POST" role="search">
					{{ csrf_field() }}
					<div  id="search-border"  class="input-group">
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
				<table class="table table-striped">  {{-- table-responsive  --}}
					<thead style="background-color: #2f2f2f; color: #c3a663;">
						<th>Borrowers Name</th>
						<th>Transaction Code</th>
						<th>Time</th>
						<th>Total</th>
						<th>Details</th>
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody style="background-color:  #464a49;">
						@if(isset($details))
							@foreach($details as $order)
							<tr>
								<td>{{$order->user->firstname ." ".$order->user->lastname}}</td>
								<td>{{$order->transaction_code}}</td>
								<td>{{$order->created_at->diffForHumans() }} </td>
								<td>{{number_format($order->total,2,".","," )}} </td>
								<td>
								 	@foreach($order->accomodations as $item)
										{{$item->name}} : {{$item->pivot->quantity}}
										<br>
									@endforeach
								</td>
								<td>{{$order->status->name}}</td>
								<td>
									<div class="row">
										@if($order->status->name == "borrowed")
											<a href="/admin/orders/reject/{{$order->id}}" class="btn btn-danger">Reject</a>
											<a href="/admin/orders/approve/{{$order->id}}" class="btn btn-success">Approve</a>
										@elseif($order->status->name == "returned")
											<a href="/admin/orders/confirm/{{$order->id}}" class="btn btn-success">Confirm</a>
											{{-- <p>{{$order->accomodation->pivot->quantity}}</p> --}}
										@endif
									</div>
								</td>
							</tr>
							@endforeach
						@else						
							<tr>
								<td colspan="7">No Item Found</td>
							</tr>
						@endif
					</tbody>

				</table>
			</div>
		</div>
	</div> 




@endsection