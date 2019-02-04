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
		{{-- <hr > --}}

		<div class="row">
			<div id="left-gallery" class="col-sm-2" style="border-right: 1px solid  #c3a663;">
				<h4 class=" py-3">Categories</h4>
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
				<br>
				<div class="form-group">
					<label for="size" style="color: #c3a663;">Size:</label>
					<select name="size" id="size" class="form-control">
						{{-- @foreach($categories as $category) --}}
							<option value="{{-- {{$category->id}} --}}">{{-- {{$category->name}} --}}</option>
						{{-- @endforeach --}}
					</select>
				</div>
				<br>
				<div class="form-group">
					<label for="color" style="color: #c3a663;">Color:</label>
					<select name="color" id="color" class="form-control">
						{{-- @foreach($categories as $category) --}}
							<option value="{{-- {{$category->id}} --}}">{{-- {{$category->name}} --}}</option>
						{{-- @endforeach --}}
					</select>
				</div>				
			</div>{{--  end categories --}}

			{{-- items --}}
			<div class="col-sm-10">
				<div class="container my-2">
					@if ( Auth::check() && Auth::user()->role_id==1 )
					<a href="/menu/add" class="btn btn-block btn-OK">Add New Item</a>
					@endif
					@if(isset($details))
					<div class="row">
						@foreach($details as $indiv_item)
							<div class="col-sm-4 my-4 text-center">
								<div class="card h-100" >
									<div class="card-title">
										<a href="/menu/{{$indiv_item->id}}" class="btn btn-block btn-OK">View Details</a>
									</div>
									<div class="card-body p-0">
										<img src="/{{$indiv_item->image_path}}" class="img-fluid" style="height:150px; width:100%;" data-toggle="modal" data-target="#modal-{{$indiv_item->id}}">
										<h5 style="background-color: #464a49; margin-bottom: 0; color: #c3a663;">{{$indiv_item->name}}</h5>
										@if($indiv_item->available != 0)
											<p style="background-color: #464a49; margin-bottom: 0; color: #c3a663;">Available: {{$indiv_item->available}}</p>
										@else
											<p style="background-color: #464a49; margin-bottom: 0;color: #c3a663;" class="text-danger">Out of Stocks</p>
										@endif
									</div>

									<!-- modal itself -->
									<div id="modal-{{$indiv_item->id}}" class="modal fade  mx-0 px-0">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<header class="modal-header m-0">
													<h5 class="modal-title">{{$indiv_item->name}}</h5>
													<button class="close" data-dismiss="modal">
														<span> &times; </span>
													</button>
												</header> <!-- end modal header -->

												<div class="modal-body">
													<img class="card-img-top img-fluid5" src="/{{$indiv_item->image_path}}" style="height: 500px;">
												</div> <!-- end modal-body -->
											</div> <!-- end modal-content -->
										</div>
									</div> <!-- end modal-1 -->
									@if ( Auth::check() && Auth::user()->role_id==2 )
									<div class="card-footer text-center">
										<form method="POST" action="/addToCart/{{$indiv_item->id}}">
											{{csrf_field()}}
											<div class="">
												@if($indiv_item->available != 0)
													<input type="number" name="quantity" title="Add Quantity" min="0" value="1" style="width: 50px;" max="{{$indiv_item->available}}">
													<button type="submit" class="btn btn-OK">Reserve Now</button>
												@else
													<input type="number" name="quantity" title="Add Quantity" min="0" value="1" style="width:50px;" disabled>
													<button type="submit" class="btn btn-OK" disabled>Reserve Now</button>
												@endif
											</div>
										</form>
									</div>
									@endif
								</div>
							</div>
						@endforeach
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
				</div>
			</div> {{-- end items --}}
		</div> {{-- end row --}}
	</div>{{--  end container --}}

@endsection

