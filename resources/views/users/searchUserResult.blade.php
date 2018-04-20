@extends('layouts.header')

@section('content')

<div class="outer">	
	<div class="inner">			
		@forelse ($value as $user)
			<ul class="list-group">
			  <li class="list-group-item d-flex justify-content-between align-items-center">
			    <img class="media-object img-rounded" src="{{ asset('images/profilePhotos/' .$user->profilePhoto)}}" height="100" width="100"> {{$user->firstName}} {{$user->lastName}}
			    <a href="view/{{$user->email}}"> <span class="badge badge-primary badge-pill">Visit Profile</span></a>
			  </li>
			</ul>
		@empty
			<ul class="list-group">
			  <li class="list-group-item d-flex justify-content-between align-items-center">
			    No User found
			  </li>
			</ul>
		@endforelse
		<center>
			<div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
			  <div class="card-header">Search Post</div>
			  <div class="card-body">
			    <h5 class="card-title">You can search post by <a href="searchPost/{{$request->key}}">clicking here ! </a></h5>
			  </div>
			</div>
		</center>
	</div>
</div>

@endsection