@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Post</div>
 <center><a href="/view_post">View Post</a></center>
               
<div class="container">
 

    <form action="{{route('edit_post', Request::segment(2))}}" method="POST">
    <div class="form-group">
      {{ csrf_field() }}
      <label for="title">Title:</label>
      <input type="text" class="form-control" placeholder="Enter title" name="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
      <label for="body">Body:</label>
      <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

            </div>
        </div>
    </div>
</div>
@endsection