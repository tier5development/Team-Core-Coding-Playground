

    @extends('post.layout')
    @section('content')

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><i>All post from  user- {{Auth::user()->email}} displayed here </i></h1>

          <!-- Author -->
         

          <hr style="height:5px;color:#444;background-color:#444;" />

          

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="http://www.ntlcg.com/wp-content/uploads/ntlcg-banner3-900x300.jpg" alt="">

           <hr style="height:4px;color:#444;background-color:#444;" />

          <!-- Post Content -->

          @if(Session::has('message') && Session::has('success'))
            <div class="alert {{ Session::get('success') ? 'alert-success' : 'alert-danger' }}">
                {{Session::get('message')}}
            </div>
          @endif
          
          @foreach($post as $show)
          @if($show->userEmail==Auth::user()->email)
                <form method="POST" action="/delete">
                   {{csrf_field() }}
                <p><h4>{{$show->title}}</b></h4><br>
                <h5>{{$show->description}}</h5>
                <footer class="blockquote-footer">Posted by:
                   <i>{{$show->userEmail}}</i>
                </footer></p>
                 <input type="hidden" class="form-control" name="post_id" value='{{$show->id}}' required>
                 <button type="submit" class="btn btn-primary">Delete</button>
                <hr style="height:2px;color:#444;background-color:#444;" />
              </form>

            @endif
          @endforeach     

         

          

@extends('post.footer')