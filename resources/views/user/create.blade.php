
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
      <div class="alert alert-danger">
        {{$errors->first('name')}}
         </div>
      @endif
     
  </div>
  <div class="form-group">
    <label for="name">Last name</label>
    <input type="text" class="form-control" name="lname" aria-describedby="lname" placeholder="Enter last name" required>
     <br>
       
      @if($errors->has('lname'))
      <div class="alert alert-danger">
        {{$errors->first('lname')}}
         </div>
      @endif
      
  </div>
  <div class="form-group">
    <label for="email">Email id</label>
    <input type="text" class="form-control" name="email" aria-describedby="email" placeholder="Enter email" required>
      <br>
        
      @if($errors->has('email'))
      <div class="alert alert-danger">
        {{$errors->first('email')}}
        </div>
      @endif
      
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <br>
      
       @if($errors->has('password'))
       <div class="alert alert-danger">
        {{$errors->first('password')}}
      </div>
       @endif
  </div>
  <div class="form-group">
    <label for="Passwordc">Re type Password</label>
    <input type="password" class="form-control" name="passwordc" id="passwordc"  placeholder="Conform Password"  required>
    <br>
      @if($errors->has('passwordc'))
      <div class="alert alert-danger">
        {{$errors->first('passwordc')}}
      </div>
      @endif
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>

</html>