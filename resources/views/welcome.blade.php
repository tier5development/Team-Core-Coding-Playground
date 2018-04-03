<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
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
                color: #636b6f;
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
        <CENTER>
            
                @if(Auth::check())
                    Welcome {{Auth::user()->name}}
                    , {{Auth::user()->email}}
                    <a href="{{route('project.logout')}}">Logout</a> 
                @else
                    <a href="login">Login</a> &nbsp&nbsp&nbsp&nbsp
                    <a href="register">Register</a>
                @endif      
            
        </CENTER>
        @if(Session::has('message') && Session::has('success'))
        <div class="alert {{ Session::get('success') ? 'alert-success' : 'alert-danger' }}">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="alert alert">  
        <div class="flex-center position-ref full-height">
          
            <div class="content">
                <div class="title m-b-md">
                    dev.durgesh.laravel
                </div>
            </div>
        </div>
    </body>
</html>