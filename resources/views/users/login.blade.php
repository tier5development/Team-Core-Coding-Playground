<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link href="https://bootswatch.com/4/materia/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	<!-- CSS for center align  -->
		<link rel="stylesheet" href="{{asset('css/mycss.css')}}">
</head>
<body>
	<center><br><br>
		@if(Session::has('message') && Session::has('success'))
		    <div class="alert {{ Session::get('success') ? 'alert-success' : 'alert-danger' }}">
		        {{Session::get('message')}}
		    </div>
		@endif
		<form method="post" action="/login">
			@csrf				  
		  	<div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
			  <div class="card-header"><h4>Login to Social Blog</h4></div>
			  <div class="card-body">
			    <h5 class="card-title">
			    	<label for="email">Email address</label>
					<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
				</h5>
				<span>
					{{-- Display errors --}}
			          @if($errors->has('email'))
			            <div class="alert alert-danger">
			              {{$errors->first('email')}}
			            </div>
			          @endif
				</span>
				<h5 class="card-title">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				</h5>
				<span>
				{{-- Display errors --}}
			          @if($errors->has('password'))
			            <div class="alert alert-danger">
			              {{$errors->first('password')}}
			            </div>
			          @endif
			    </span>
				<button type="submit" class="btn btn-success float-left	">Login</button>
				<a href="/forgotUserPassword"><input type="button" name="forgotPassword" class="btn btn-warning float-right" value="Forgot Password"></a>
			  </div>
			</div>
		</form>
	</center>
</body>
</html>