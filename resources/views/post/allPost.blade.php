@extends('layouts.header')

@section('content')
{{-- display the posts --}}
	<div class="content">
		<div class="outer">
			<div class="middle">
				<div class="inner">
					<center>
						@if(Session::has('message') && Session::has('success'))
						    <div class="alert {{ Session::get('success') ? 'alert-success' : 'alert-danger' }}">
						        {{Session::get('message')}}
						    </div>
						@endif
						@forelse ($allPost as $post)
							<div class="card mb-3 card text-black bg-default mb-3">
								<h3 class="card-header"> {{ $post->title }} </h3>
								  <div class="card-body">
								  	<img style="height: 200px; width: 100%; display: block;" src="{{ asset('images/postPhoto/' .$post->photo)}}" alt="Card image">
								  <div class="card-body">
								    <p class="card-text"> {{ $post->description }} </p>
								  </div>
								  <ul class="list-group list-group-flush">
								    <li class="list-group-item"><footer class="blockquote-footer">Posted by:<i><a href="view/{{$post->author}}"> {{$post->author}}</a></i></footer></p></li>
								  </ul>
								  @if($post->author == Auth::user()->email)
								  @else
									  <div class="card-body">
									    <a href="like/{{base64_encode($post->id)}}" class="card-link">{{$post->likes}} Like</a>
									    <a href="dislike/{{base64_encode($post->id)}}" class="card-link">{{$post->dislikes}} Dislike</a>
									  </div>
								  @endif
								  <div class="card-footer text-muted">
								    {{$post->created_at->diffforHumans()}}<br>
								  </div>
								  	@if($post->author == Auth::user()->email)
								  	<div><br>
								  		{{-- edit --}}
								    	<a href="edit/{{base64_encode($post->id)}}"> <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-info-sign"></i> Edit </button> </a>
								    	{{-- delete --}}
									    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="Are you sure you want to delete this user ?">
									        <i class="glyphicon glyphicon-trash"></i> Delete
									    </button>
									    <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
										  {{-- hidden model --}}
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h4 class="modal-title">Delete Parmanently</h4>
										      </div>
										      <div class="modal-body">
										        <p>Are you sure about this ?</p>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
										        <a href="{{ route('post.destroy',base64_encode($post->id)) }}">
										        	<button type="button" class="btn btn-danger" id="confirm">Delete</button>
										        </a>
										      </div>
										    </div>
										  </div>
										  {{-- hidden model ends --}}
										</div>
								    </div>
								    @else
								    @endif
								</div>
							</div>
							<hr style="height:4px;background-color:#3f4147;">
						@empty
							<center> No Posts </center>
						@endforelse
							<center>@include('layouts.footer')</center>
					</center>
				</div>
			</div>
		</div>
	</div>

@endsection
