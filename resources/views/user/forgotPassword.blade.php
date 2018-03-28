<html>
<head>
<title> Login </title>
</head>

<body>

		<form method="POST" action="/forget" id="registration">
	  		{{csrf_field() }}
	    	<div class="form-group">
	    		<label for="email"><b>Email id</b></label>
	    		<input type="email" class="form-control" name="email" aria-describedby="email" placeholder="Enter email" required>
	  		</div>
	  		
	  		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<br>Login ?<a href="/login"> Login here</a>
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
	
</body>

</html>