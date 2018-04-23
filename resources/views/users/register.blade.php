<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	<!-- CSS for center align  -->
		<link rel="stylesheet" href="{{asset('css/mycss.css')}}">
</head>
<body>
<div class="outer">
	<div class="middle">
		<center>
			<div class="card text-white bg-info mb-3" style="max-width: 20rem;">
				<form method="post" action="/registerNewUser" enctype="multipart/form-data">
					@csrf
				  <fieldset>
				    <div class="card-header"><h4>Create a new account in Social Blog</h4></div>
				    <br>
				    <div class="form-group">
				      <label for="firstName">First Name</label>
				      <input type="text" class="form-control" name="firstName" id="firstName" aria-describedby="emailHelp" placeholder="Enter first name">
				    </div>
				    <div class="form-group">
				      <label for="lastName">Last Name</label>
				      <input type="text" class="form-control" name="lastName" id="lastName" aria-describedby="emailHelp" placeholder="Enter last name">
				    </div>
				    <div class="form-group">
				      <label for="email">Email address</label>
				      <input type="email" class="form-control" name="email" id="email"  aria-describedby="emailHelp" placeholder="Enter email">
				    </div>
				    <div class="form-group">
				      <label for="password">Password</label>
				      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
				    </div>
				    <div class="form-group">
				      <label for="confirmPassword">Confirm Password</label>
				      <input type="password" class="form-control" id="confrimPassword" name="confirmPassword" placeholder="Confirm Password"> <small>Must be same as password</small>
				    </div>
				    <input type="file" name="photo"  id="photo" class="form-control">
				    </fieldset>
				    <br>
				    <button type="submit" class="btn btn-primary">Submit</button><br>
				    <div class="form-group">
				  		<label for="login">Already has an account ?</label><a href="{{ route('user.login') }}"><input type="button" name="login" class="btn btn-success " value="Login"></a>
				  	</div>
				  	</fieldset>
				</form>
			</div>
		</center>
	</div>
</div>

</body>
</html>