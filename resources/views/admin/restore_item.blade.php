@extends('layouts.app')
@section('title','Deleted Item')
@section('content')
	<div class="container">
		<h4 class="text-center py-4">Deleted Item</h4>
			@if(Session::has("success_message"))
				<div class="alert alert-success text-center">{{Session::get("success_message")}}</div>
			@endif
		<div class="row">
			@if($item != null)
			<div class="col-sm-12">
				<div class="container my-5">
					{{-- <a href="" class="btn btn-danger">Restore All Item</a> --}}
					<div class="row">
						@foreach($item as $indiv_item)
							<div class="col-sm-4 my-4 text-center">
								<div class="card h-100">
									<div class="card-body">
										<img src="/{{$indiv_item->image_path}}" class="img-fluid" style="height:150px">
										<h5>{{$indiv_item->name}}</h5>
									</div>
									<div class="card-footer">
										<a href="/menu/{{$indiv_item->id}}/restore" class="btn btn-block btn-OK">Restore Item</a>
										<button class="btn btn-NG btn-block" data-toggle="modal" data-target="#confirmPermanentlyDelete">Permanently Delete</button>
									</div>
								</div>
							</div>
							<div class="modal fade" id="confirmPermanentlyDelete" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h4>Confirm Delete</h4>
										</div>
										<div class="modal-body">
											<p>Are you sure you want to permanently delete this movie?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-OK" data-dismiss="modal">Cancel</button>
											<form method="POST" action="/menu/{{$indiv_item->id}}/permanentlydelete">
												{{csrf_field()}}
												{{method_field("DELETE")}}
												<button type="submit" class="btn btn-danger">Confirm</button>

											</form>
										</div>
									</div>
								</div>
							</div> {{-- end delete modal --}}
						@endforeach
					</div>
				</div>
			</div> {{-- end items --}}

			@else
			<div class="col-sm-12">
				<p>empty</p>
			</div>
			@endif
		</div> {{-- end row --}}
	</div>{{--  end container --}}
@endsection

