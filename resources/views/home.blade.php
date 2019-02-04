@extends('layouts.app')

@section('content')
    @if(Session::has('error'))
        <div class="alert alert-danger">
        {{Session::get('error')}}
        </div>
    @endif
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border: 3px solid #c3a663;">
                    <div class="card-header" style="background-color: #2f2f2f; color: #c3a663;">Dashboard</div>

                    <div class="card-body" style="background-color:  #464a49;">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ( Auth::check() && Auth::user()->role_id==1 )
                        <h2>You are logged in as Admin!</h2>
                        @else
                        <h2>You are logged in as User!</h2>
                        @endif

                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
