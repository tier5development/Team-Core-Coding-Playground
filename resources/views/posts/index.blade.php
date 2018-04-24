@extends('master2')
@section('title','Index')

@section('content')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<h2>All Posts</h2>
	<table class="table table-bordered table-striped table-hover table-condensed table-responsive" id="table">	
		<thead>
			<tr>
				<td>Title</td>
				<td>Created At</td>
				<td>
					<a class="create-modal btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i></a>
				</td>
			</tr>
		</thead>
		@csrf
			@foreach ($post as $key => $value)
				<tbody>
					<tr class="{{$value->id}}">
						<td>{{$value->title}}</td>
						<td>{{$value->created_at}}</td>
						<td>
							<a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}"><i class="fa fa-eye"></i></a>
							<a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}"><i class="glyphicon glyphicon-pencil"></i></a>
							<a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}"><i class="glyphicon glyphicon-trash"></i></a>
						</td>
					</tr>
				</tbody>
			@endforeach
	</table>
	{{--Form Create Post--}}
	<div id="create" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form">
						<div class="form-group row add">
							<label class="control-label col-sm-2" for="title">Title:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="title" name="title" placeholder="Your Title Goes Here" required></input>
								<p class="error text-center alert alert-danger hidden"></p>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="body">Body:</label>
							<div class="col-sm-10">
								<textarea type="text" cols="30" rows="10" class="form-control" id="body" name="body" placeholder="Your Body Goes Here" required></textarea>
								<p class="error text-center alert alert-danger hidden"></p>
							</div>
						</div>
					</form>
				</div>
					<div class="modal-footer">
						<button class="btn btn-warning" type="submit" id="add" data-dismiss="modal">
							<span class="glyphicon glyphicon-plus"></span>Save Post
						</button>
						<button class="btn btn-warning" type="button" data-dismiss="modal">
							<span class="glyphicon glyphicon-remobe"></span>Close
						</button>
					</div>
			</div>
		</div>
	</div>	 
@stop