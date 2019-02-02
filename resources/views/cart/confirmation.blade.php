@extends('layouts.app')
@section('title','Confirmation')
@section('content')
	<h1 class="text-center">Confirmation Page</h1>
		<div class="container">
			<div class="row text-danger">
				@if(count($errors) > 0)
					@foreach($errors->all() as $error)
					<p>{{$error}}</p>
					@endforeach
				@endif
			</div>

			<div class="row">
				<div class="col-sm-12">
					<h3>Reference No.: {{$order->transaction_code}}</h3>

					<p>Please print this when you get your item(s).</p>

					<a class="btn btn-primary" href="/gallery">Go back to gallery</a>	
				</div>
			</div>
		</div>{{--  end container --}}
@endsection

