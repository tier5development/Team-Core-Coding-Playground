<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form  action="/resetP" method="POST">
	
Email : <input type="email" name="email"><br>
Password : <input type="password" name="password"><br>

<input type="hidden" name="token" value="{{ Session::token() }}" />

Retype Password : <input type="password" name="password1"><br>



<input type="submit" name="submit" value="submit">



</form>





</body>
</html>