@extends('test')
<body>
<center>
  <br><br><br><br><br><br>
<h1>Index</h1>

@if(count($posts)>0)

@foreach ($posts as $post)
<br>

    <h3> <a href="/post/{{$post->id}}"> {{$post->title}}</a></h3>

  @endforeach
  @else
  <p>No data in database</p>
  @endif




</center>
</body>
