<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('lib/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('lib/css/blog-post.css')}}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{route('project.home')}}">Laravel Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
             <li class="nav-item">
              <a class="nav-link" href="/home"> <li class="nav-item">
              @if(Auth::check())
                    Welcome {{Auth::user()->name}}
              @endif      
            </li></a>
            </li>
                      
            <li class="nav-item">
              <a class="nav-link" href="/create">Create Post</a>
            </li>
          

            @if(Auth::check())
             <li class="nav-item">
                <a class="nav-link" href="{{route('project.mypost')}}">My Post</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('project.logout')}}">Logout</a>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="{{route('project.login')}}">Login</a>
              </li>
            @endif

            <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
            </li> 

           </ul>
        </div>
      </div>
    </nav>