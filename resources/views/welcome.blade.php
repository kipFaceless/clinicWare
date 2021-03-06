<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ClinicWare</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <!-- Styles -->
        <style>
            html, body {
                background-image: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
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

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}"><i class="fa fa-th-large fa-fw " style="color: white; font-size: 15px;"></i> ??rea Administrativa</a>
                    @else
                        <a href="{{ route('login') }}"><i class="fa fa-sign-in fa-fw " style="color: white; font-size: 15px;"></i> Entrar</a>
                       {{--
                        <a href="{{ route('register') }}">Registrar-se</a>
                        --}} 
                    @endauth
                </div>
            @endif


             <div style="width: 100%">
                    
                <div style="float: left; width: 50%">
                    <span style="font-size: 60px; color: #fff;margin-left: 50px;">CLINIC WARE</span>

                    <p class="" style="color: #fff;margin-left: 50px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit.</p>

                    
                </div>

                <div style="float: right; width: 50%">

                  <img src="{{asset('img/dat svg.svg')}}" alt="" style="width: 100%">   
                    
                </div>
                </div>
            

        </div>

          

               
               
          
    </body>
</html>
