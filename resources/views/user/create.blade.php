
<html>
<head>
<title> Register </title>
</head>

<body>
@extends('post.layout')
<hr>
<form method="POST" action="/nuser" id="registration">
  {{csrf_field() }}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Enter name" required>
    <br>
    @if($errors->has('name'))
      {{$errors->first('name')}}
    @endif
  </div>
  <div class="form-group">
    <label for="name">Last name</label>
    <input type="text" class="form-control" name="lname" aria-describedby="lname" placeholder="Enter last name" required>
     <br>
    @if($errors->has('lname'))
      {{$errors->first('lname')}}
    @endif
  </div>
  <div class="form-group">
    <label for="email">Email id</label>
    <input type="text" class="form-control" name="email" aria-describedby="email" placeholder="Enter email" required>
      <br>
    @if($errors->has('email'))
      {{$errors->first('email')}}
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <br>
     @if($errors->has('password'))
      {{$errors->first('password')}}
    @endif
  </div>
  <div class="form-group">
    <label for="Passwordc">Re type Password</label>
    <input type="password" class="form-control" name="passwordc" id="passwordc"  placeholder="Conform Password"  required>
    <br>
    @if($errors->has('passwordc'))
      {{$errors->first('passwordc')}}
    @endif
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>

</html>