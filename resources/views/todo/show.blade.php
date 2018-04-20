@extends('layout.app')

@section('body')
	<br>
	<h1>{{$item->title}}</h1><br>
	<h3>{{$item->body}}</h3><br><br>
	<a href="/todo" class="btn btn-info">Back</a><br>
@endsection
