@extends('layout.app')

@section('body')
	<br>
	<div class="col-gl-4 col-lg-offset-4">
		<h1>Edit Item </h1>
		<form action="/todo/{{$item->id}}" method="POST">
			@method('PUT')
			{{csrf_field()}}
		  
		  	<input type="text" name="title" placeholder="Title" value= "{{$item->title}}"><br><br>
		  	<textarea name="body" rows="5" placeholder="Body" cols="70">{{$item->body}}</textarea><br>
		    
		    <button type="submit" class="btn btn-success">Update</button>
		  
		  <a href="/todo" class="btn btn-info">Back</a><br>
		</form><br>
		@if (count($errors)>0)
			<div class="alert-danger"> 
			@foreach ($errors->all() as $error)
				{{$error}}
			@endforeach
			</div>
		@endif
	</div>
@endsection