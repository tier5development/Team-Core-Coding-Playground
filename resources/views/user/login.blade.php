<html>
<head>
<title> Login </title>
</head>

<body>

	@if(Auth::check())
		 Welcome {{Auth::user()->name}}
	@else
		<form method="POST" action="/ulogin" id="registration">
	  		{{csrf_field() }}
	    	<div class="form-group">
	    		<label for="email"><b>Email id</b></label>
	    		<input type="email" class="form-control" name="email" aria-describedby="email" placeholder="Enter email" required>
	  		</div>
	  		<div class="form-group">
	    		<label for="Password"><b>Password</b></label>
	    		<input type="password" class="form-control" name="password" placeholder="Password" required>
	  		</div>
	 
	  		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<br>New user ?<a href="/register"> Register here</a>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		        <li>Errors</li>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	@endif	
</body>

</html>