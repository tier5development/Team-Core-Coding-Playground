@extends('layout.header')

@section('content')
<center><br><br>
	<form method="post" action="/register">
	@csrf
	<div class="card text-white bg-dark mb-3" style="max-width: 25rem;">
		<div class="card-header"><h4>Register here in Flipbabon</h4></div>
			<div class="card-body">

			<h5 class="card-title">
			<label for="name">Full Name</label>
			<input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name">
			</h5>
			<span>
			{{-- Display errors --}}
				@if($errors->has('name'))
					<div class="alert alert-danger">
						{{$errors->first('name')}}
					</div>
				@endif
			</span>

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

			<h5 class="card-title">
			<label for="confirmpassword">Re-type Password</label>
			<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Re-type Password">
			</h5>
			<span>
			{{-- Display errors --}}
			@if($errors->has('confirmpassword'))
				<div class="alert alert-danger">
					{{$errors->first('confirmpassword')}}
				</div>
			@endif
			</span>
			<center>
			<button type="submit" class="btn btn-info ">Register</button><br><br>
			</center>
			<a href="/"><input type="button" name="login" class="btn btn-default float-left" value="Login"></a>
				<a href="/forgotUserPassword"><input type="button" name="forgotPassword" class="btn btn-warning float-right" value="Forgot Password"></a>
			</div>
		</div>
	</form>
</center>
@endsection

@section('footer')
	@include('layout.footer')
@endsection
