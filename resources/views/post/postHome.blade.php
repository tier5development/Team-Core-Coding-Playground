

    @extends('post.layout')
    @section('content')

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4">All post from user displayed here </h1>

          <!-- Author -->
         

          <hr>

          

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="http://www.ntlcg.com/wp-content/uploads/ntlcg-banner3-900x300.jpg" alt="">

          <hr>

          <!-- Post Content -->

          @foreach($post as $show)
                <p><h4>{{$show->title}}</b></h4></p>
                <p>{{$show->description}}</p>
                <footer class="blockquote-footer">Posted by:
              <cite title="Source Title">{{$show->userEmail}}</cite>
            </footer>
           @endforeach     

         

          <hr>
{{--@extends('post.sidebar')--}}
@extends('post.footer')