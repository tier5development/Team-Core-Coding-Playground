<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tangerine">
</head>
<body>

<form action="/loginuser" method="POST">
{{csrf_field() }}  
  email:<input type="text" name="email"><br>
  Password:<input type="password" name="password"><br>
<input type="submit" name="login" value="Login">

</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<a href="/forgotpw">Forgot your password</a>





</center>


</body>
</html>
