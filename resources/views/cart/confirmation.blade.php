@extends('layouts.app')
@section('title','Confirmation')
@section('content')
	<h4 class="text-center py-3">Confirmation Page</h4>
		<div class="container">
			<div class="row text-danger">
				@if(count($errors) > 0)
					@foreach($errors->all() as $error)
					<p>{{$error}}</p>
					@endforeach
				@endif
			</div>

			<div class="row">
				<div class="col-sm-12 text-center">
					<h3>Reference No.: {{$order->transaction_code}}</h3>

					<p><span class="text-danger">*</span>Please wait while your request is being processed.</p>

					<a class="btn btn-primary" href="/gallery">Go back to gallery</a>	
				</div>
			</div>
		</div>{{--  end container --}}
@endsection

