<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Looks4rent</title>

        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">   

        <!-- fav icon -->
        <link rel="icon" type="image/gif/png" href="/images/fav.png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <link href="https://fonts.googleapis.com/css?family=Federant" rel="stylesheet">
        <!-- font-family: 'Federant', cursive; -->

        <link href="https://fonts.googleapis.com/css?family=Playball" rel="stylesheet">
        <!-- font-family: 'Playball', cursive; -->
        <!-- Styles -->
        <style>
            html, body {
                background-image: url(/images/bg.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
                background-position: center center;
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: left;
                display: flex;
                justify-content: left;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            h1 {
                /*font-size: 84px;*/
                /*color: #E51666;*/
                /*color: #9b1b1f;*/
                color: #c3a663;
                font-family: 'Playball', cursive;
                font-size: 100px;
                text-shadow: 4px 4px 6px #000000;
                padding: 0;
                margin-bottom: 10px !important;
                margin-left: 20px !important;

            }

            .links > a {
                /*color: #636b6f;*/
                font-family: 'Federant', cursive;
                color: #c3a663;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > a:hover {
                font-family: 'Federant', cursive;
                color: #9b1b1f;
                /*color: black;*/
                text-decoration: underline;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="container ">
                    <div class="row">
                        <h1><img src="/images/fav.png" style="width: 70px;">Looks4rent</h1>
                        
                    </div>
                </div>

                @if (Route::has('login'))
                    <div class="links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ url('/gallery') }}">Guest</a>
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
