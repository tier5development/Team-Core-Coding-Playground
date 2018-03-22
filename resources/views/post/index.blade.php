@extends('test')
<body>
<center>
  <br><br><br><br><br><br>
<h1>Index</h1>

@if(count($posts)>0)

@foreach ($posts as $post)
<br>
  <div class ="well">
    <h3> {{$post->title}}</h3>
    <h6> {{$post->description}}</h6>
    <div>
  @endforeach
  @else
  <p>No data in database</p>
  @endif




</center>
</body>
