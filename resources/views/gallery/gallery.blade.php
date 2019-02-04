@extends('layouts.app')
@section('title','Gallery')
@section('search')

	<form action="/search" method="POST" role="search">
		{{ csrf_field() }}
		<div id="search-border" class="input-group">
			<input id="search" type="text" class="form-control" name="search"
				placeholder="Search...">
				<span class="input-group-btn">
					<button class="btn btn-default-sm" type="submit">
						<i class="fa fa-search"><span class="glyphicon glyphicon-search"></span></i>
					</button>
				</span>
			{{-- <input id="search" type="text"class="textbox" placeholder="Search.." name="search">
			<button type="submit" ><i class="fa fa-search"></i></button> --}}
		</div>
	</form>

@endsection

@section('content')
	<div class="container">
		<h4 class="text-center py-3">Gallery</h4>
		@if(Session::has("success_message"))
			<div class="alert alert-success text-center">{{Session::get("success_message")}}</div>
		@endif
		@if(Session::has("success_cart"))
			<div class="alert alert-success text-center">{{Session::get("success_cart")}}</div>
		@endif
		<hr>

		<div class="row">
			<div class="col-sm-2">
				<h2 class=" py-3">Categories</h2>
				<ul class="list-group">
					<a href="/gallery">
						<li class="list-group-item">All</li>
					</a>

					@foreach(\App\Category::all() as $category)
						<a href="/menu/categories/{{$category->id}}" >
							<li class="list-group-item">
								{{$category->name}}
							</li>
						</a>
					@endforeach
				</ul>
		
			</div>{{--  end categories --}}

			{{-- items --}}
			<div class="col-sm-10">
				<div class="container my-5">
					@if ( Auth::check() && Auth::user()->role_id==1 )
					<a href="/menu/add" class="btn btn-success">Add New Item</a>
					@endif
					@if(isset($details))
					<div class="row">
						@foreach($details as $indiv_item)
							<div class="col-sm-4 my-4 text-center">
								<div class="card h-100">
									<div class="card-body">
										<img src="/{{$indiv_item->image_path}}" class="img-fluid" style="height:150px">
										<h5 class="card-title">{{$indiv_item->name}}</h5>
										@if($indiv_item->available != 0)
											<p>Available: {{$indiv_item->available}}</p>
										@else
											<p class="text-danger">Out of Stocks</p>
										@endif
									</div>
									<div class="card-footer text-center">
										<form method="POST" action="/addToCart/{{$indiv_item->id}}">
											{{csrf_field()}}
											<div class="">
												@if($indiv_item->available != 0)
													<a href="/menu/{{$indiv_item->id}}" class="btn btn-block btn-outline-primary">View Details</a>
													<input type="number" name="quantity" title="Add Quantity" min="0" value="1" style="width: 100px" max="{{$indiv_item->available}}">
													<button type="submit" class="btn btn-success">Reserve Now</button>
												@else
													<a href="/menu/{{$indiv_item->id}}" class="btn btn-block btn-outline-primary">View Details</a>
													<input type="number" name="quantity" title="Add Quantity" min="0" value="1" style="width: 100px" disabled>
													<button type="submit" class="btn btn-success" disabled>Add to Cart</button>
												@endif
											</div>
										</form>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					@else
						<h2>No Item Found!</h2>
					@endif
				</div>
			</div> {{-- end items --}}
		</div> {{-- end row --}}
	</div>{{--  end container --}}

@endsection

