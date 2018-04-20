@extends('layouts.header')

@section('content')
	<form method="POST" action="/createPost" enctype="multipart/form-data">
		@csrf
		 @include('post._form',['edit' => 0])
		
	</form>
@endsection
