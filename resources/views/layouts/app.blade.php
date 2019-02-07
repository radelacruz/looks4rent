<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title','Looks4rent')</title>

	
	
	<!-- fontawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
	<!-- fav icon -->
	<link rel="icon" type="image/gif/png" href="/images/fav.png">

	<!--icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
	<!-- font-family: 'Kalam', cursive; -->

	<link href="https://fonts.googleapis.com/css?family=Sigmar+One" rel="stylesheet">
	<!-- font-family: 'Sigmar One', cursive; -->

	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<!-- font-family: 'Pacifico', cursive; -->

	<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
	<!-- font-family: 'Gloria Hallelujah', cursive; -->

	<link href="https://fonts.googleapis.com/css?family=Federant" rel="stylesheet">
	<!-- font-family: 'Federant', cursive; -->

	<link href="https://fonts.googleapis.com/css?family=Playball" rel="stylesheet">
	<!-- font-family: 'Playball', cursive; -->
	<!-- script dependencies for boostrap -->
	<!-- bootsrap css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- external css -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	



	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	{{-- <link rel="stylesheet" type="text/css" href="/css/style.css"> --}}
</head>
<body>
	<div id="app" class="container-fluid px-0">
		<div class="container-fluid px-0">
			<nav id="navbar" class="navbar navbar-expand-md navbar-dark navbar-laravel">
				<img class="icon img-fluid" src="/images/fav.png" style="height: 50px">
				<a class="navbar-brand" href="{{ url('/') }}">
					<strong>Looks4rent</strong>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">

					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Authentication Links -->
						<li>
							@yield('search')
						</li>

						@guest
							<li class="nav-item">
								<a href="/gallery" class="nav-link">Gallery</a>
							</li>

							{{-- <li class="nav-item">
								<a href="/menu/mycart" class="nav-link">Cart<span class="badge text-danger">
									@if(Session::has('cart'))
										{{array_sum(Session('cart'))}}
									@endif
								</span></a>
							</li> --}}
							
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
							</li>
							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
							@endif
						@else
								<li class="nav-item">
									<a href="/gallery" class="nav-link">Gallery</a>
								</li>  

							@if(Auth::user()->role_id == 2)
								<li class="nav-item">
									<a href="/home" class="nav-link">Home</a>
								</li>
							
								<li class="nav-item">
									<a href="/user/orders" class="nav-link">Transaction</a>
								</li> 

								<li class="nav-item">
									<a href="/menu/mycart" class="nav-link">Cart<span class="badge text-danger">
										@if(Session::has('cart'))
											{{array_sum(Session('cart'))}}
										@endif
									</span></a>
								</li>
							@endif

							@if(Auth::user()->role_id == 1)
								<li class="nav-item">
									<a href="/admin/orders" class="nav-link">Transaction</a>
								</li> 
								<li class="nav-item">
									<a href="/restore" class="nav-link">Restore</a>
								</li> 

								<li class="nav-item">
									<a href="/category" class="nav-link">Category</a>
								</li> 
							@endif


							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->firstname }} <span class="caret"></span>
								</a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}"
									   onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>

									<a class="dropdown-item" href="/myprofile/{{Auth::user()->id}}" class="nav-link">Edit Profile</a>
								</div>
							</li>
						@endguest
					</ul>
				</div>
			</nav>
		</div>

		<main class="py-4">
			@yield('content')
		</main>

{{-- 		<footer>
			@yield('footer')	
		</footer> --}}

	<footer id="footer" class="row px-3 justify-content-center text-light mt-5"> <!-- bg-dark fixed-bottom  -->
		<small class="py-5"> <!-- class="text-muted" -->
			<div id="disclaimer" class="text-center">
					<span>DISCLAIMER: I do not own nor claim to own any content within this site. Images in this site are from Google Images. Photos are used for training purposes and not to commercialize nor profit.</span>
					<br>
					<a target="_blank" href="https://radcportfolio.herokuapp.com/">Razelle Ann Dela Cruz</a> | Tuitt Coding Bootcamp <span class="font-color-main">&copy;2019 Looks4rent</span>
			</div>
			<hr class="footer-hr">
			<div id="social" class="text-center">
				<!-- start social media -->
				<div>
					<a target="_blank" href="https://www.twitter.com/razelleanndc" class="fa fa-twitter hvr-float mx-3"></a>
					<a target="_blank" href="https://www.facebook.com/razelleanndc" class="fa fa-facebook hvr-float mx-3"></a>
					<a target="_blank" href="https://www.instagram.com/razelleanndc" class="fa fa-instagram hvr-float mx-3"></a>
				</div> <!-- end social media -->

			</div> <!-- end footer body -->
			@yield('b2top')
		</small>
	</footer>

	</div>
	<!-- external js -->
	<script type="text/javascript" src="../assets/js/script.js"></script>

</body>
</html>
