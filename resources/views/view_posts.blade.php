@extends('layouts.app')

@section('content')
<div class="container">
<a href="/create_post" class="btn btn-primary">Create Post</a>

               
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Posts</div>

<div class="container" style="background-color: yellow">
 <table class="table table-hover">
  <!--  <thead>
      <tr>
        <th>Title</th>
        <th>Body</th>
        <th>Created At</th>
        <th>Updated At</th>
      </tr>
    </thead>-->
@foreach($posts as $post)
    
        <h2>{{$post->title}}</h2>
       <p style="color:red;">{{$post->body}}</p>
        created at<span class="btn btn-primary">{{ ($post->created_at)->diffForHumans()}}</span>
        updated at<span class="btn btn-primary">{{ ($post->updated_at)->diffForHumans()}}</span>
        <br><br>
       <a href="{{route('edit', $post->id)}}" class="btn btn-primary">Edit Post</a>&nbsp
        <a href="/delete/{{$post->id}}" class="btn btn-danger">Delete Post</a>
        <br>
        

 
 @endforeach


            </div>
        </div>
    </div>
</div>
<div class="mt-4">{{$posts->links()}}</div>
@endsection
