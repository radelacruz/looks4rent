@extends('layouts.app')

@section('content')
    @if(Session::has('error'))
        <div class="alert alert-danger">
        {{Session::get('error')}}
        </div>
    @endif
    <div class="container" >
        <div class="row justify-content-center">
			<div class="col-sm-12 text-center">
				<div class="card" style="border: 3px solid #c3a663;">
                    <div class="card-header" style="background-color: #2f2f2f; color: #c3a663;">
                    	<h5 class="">You have no access to this page!</h5>
                    </div>

                    <div class="card-body text-center" style="background-color:  #464a49;">
     					<a class="btn btn-OK" href="/login">Go back to Login</a>
                    </div>
                </div>					
			</div>
        </div>
</div>
@endsection
