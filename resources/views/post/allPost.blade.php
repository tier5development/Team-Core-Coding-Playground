@extends('layouts.header')

@section('content')
{{-- display the posts --}}
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
					<div class="card mb-3">
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
						    	<a href="edit/{{base64_encode($post->id)}}"> <button type="button" class="btn btn-info"> Edit </button> </a>
						    	{{-- delete --}}
						    	{!! Form::open(['method' => 'DELETE','route' => ['post.destroy', base64_encode($post->id)],'style'=>'display:inline']) !!}
					            {!! Form::button('Delete', ['class' => 'btn btn-danger','data-toggle'=>'confirmation']) !!}
					            {!! Form::close() !!}

						    </div>
						    @else
						    @endif
						</div>
					</div>
					<hr style="height:4px;background-color:#3f4147;" />
				@empty
					<center> No Posts </center>
				@endforelse
			</center>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {        
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.closest('form').submit();
            }
        });   
    });
</script>
@endsection