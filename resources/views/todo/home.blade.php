
@extends('layout.app')

@section('body')
	<br>
	<div class="col-gl-4 col-lg-offset-4">
		<h1>ToDo all lists <a href="todo/create" class=" btn"><h2><b>+</b></h2></a> <a href="todo/create" class=" btn"><h2><b>-</b></h2></a></h1>
		
		{{--  --}}


			{{-- by different --}}

			<table class="table table-hover">
					<center>
				<thead>
				<tr>
				<th scope="col">Title</th>
				<th scope="col">Created at</th>
				<th scope="col">Updated at</th>
				<th scope="col">Action</th>
				</tr>
				</thead>

					</center>
				<tbody>
				@foreach ($todos as $todo)
				@if($todo->id % 2 == 0)
				<tr class="table-default">
				@else
				<tr class="table-info">
				@endif
				
					
				    	<center><td><a href="{{'todo/'.($todo->id)}}"> {{$todo->title}}</a></td>
				    	<td><span >{{$todo->created_at->diffforHumans()}}</span></td>
				    	<td><span >{{$todo->updated_at->diffforHumans()}}</span></td>
				    	<td><a href="{{'todo/'.($todo->id).'/edit'}}"  class=" btn"><b>Edit</b></a>&nbsp
				    		<form class="pull-left form-group" method="POST" action="{{'/todo/'.$todo->id}}">
				    			@csrf
				    			@method('DELETE')
				    		<button type="submit">Delete</button>
				    		</form>

				    	</td>
				    	</center>
			  		
				 
				
				</tr>
				@endforeach
				</tbody>
			</table>

			{{-- sjdfgosadfu --}}

		  
		
	</div>
	
@endsection

