<!DOCTYPE html>
<html>
<head lang="en">
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="{{route('home')}}">Blogs</a> 
		    </div>
		  </div>
		</nav>
		<div class="container">
			@yield('content')
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		{{-- Ajax Form Add --}}
		<script type="text/javascript">
			$(document).on('click','.create-modal', function(){
				$('#create').modal('show');
				$('.form-horizontal').show();
				$('.modal-title').text('Add Post');
			});
		</script>
		<div class="bg-dark text-white p-4 text-center">
			All rights reserved Blogs {{date('Y')}}
		</div>
</body>
</html>