@extends('layouts.app')
@section('title','Confirmation')
@section('content')
		<div class="container">
		<h4 class="text-center py-3">Confirmation Page</h4>
			<div class="row text-danger">
				@if(count($errors) > 0)
					@foreach($errors->all() as $error)
					<p>{{$error}}</p>
					@endforeach
				@endif
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="card" style="border: 3px solid #c3a663;">
	                    <div class="card-header" style="background-color: #2f2f2f; color: #c3a663;">
	                    	<h5 class="">Reference No.: {{-- {{$order->transaction_code}} --}}</h5>
	                    	<p><i><span class="text-danger">*</span>Please wait while your request is being processed.</i></p>
	                    </div>

	                    <div class="card-body " style="background-color:  #464a49;">
	     					<a class="btn btn-block btn-OK" href="/gallery">Go back to gallery</a>
	                    </div>
	                </div>					
				</div>
				<div class="col-sm-6">
					<div class="card" style="border: 3px solid #c3a663;">
	                    <div class="card-header" style="background-color: #2f2f2f; color: #c3a663;">
	                    	<h5 class="">User Information</h5>
	                    	<p><i><span class="text-danger">*</span>Please make sure that the following details are correct.</i></p>
	                    </div>

	                    <div class="card-body" style="background-color:  #464a49;">
	     					<p>Full Name: {{Auth::user()->firstname ." ". Auth::user()->lastname}}</p>
							<p>Address: {{Auth::user()->address}}</p>
							<p>Email: {{Auth::user()->email}}</p>
							<p>Start Date: {{$order->start_date}} </p>
							<p>End Date: {{$order->end_date}}</p>

	                    </div>
	                </div>
				</div>
			</div>
		</div>{{--  end container --}}
@endsection

