<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tangerine">
</head>
<body>
<center>
<form action="/loginme" method="POST">

  <input type="hidden" name="_token" value="{{csrf_token()}}">


  Username:<input type="text" name="username"><br>
  Password:<input type="password" name="password"><br>
<input type="submit" name="login" value="Login">

</form>

</center>


</body>
</html>
