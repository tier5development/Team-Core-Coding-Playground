@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Post</div>
 <center><a href="/view_post">View Post</a></center>
               
<div class="container">
 
  <form action="{{route('save_post')}}" method="POST" enctype="multipart/form-data">
    <div class="form-group">
     <!-- {{ csrf_field() }} -->
     @csrf
      <label for="title">Title:</label>
      <input type="text" class="form-control" placeholder="Enter title" name="title">
    </div>
    <div class="form-group">
      <label for="body">Body:</label>
      <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
    </div>

     <input type="file" name="image" class="btn btn-danger" id="image">

   
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

            </div>
        </div>
    </div>
</div>
@endsection