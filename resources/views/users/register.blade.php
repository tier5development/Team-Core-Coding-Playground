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
		<div class="inner">
			<center>
				<form method="post" action="/registerNewUser" enctype="multipart/form-data">
					@csrf
				  <fieldset>
				    <legend>Create a new account in Social Blog</legend>
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
				      <input type="email" class="form-control" id="email" name="email"  aria-describedby="emailHelp" placeholder="Enter email">
				    </div>
				    <div class="form-group">
				      <label for="password">Password</label>
				      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
				    </div>
				    <div class="form-group">
				      <label for="confirmPassword">Password</label>
				      <input type="password" class="form-control" id="confrimPassword" name="confirmPassword" placeholder="Confirm Password"> <small>Must be same as password</small>
				    </div>
				    <input type="file" name="photo"  id="photo" class="form-control">
				    </fieldset>
				    <button type="submit" class="btn btn-primary">Submit</button>
				  </fieldset>
				</form>
			</center>
		</div>
	</div>
</div>

</body>
</html>