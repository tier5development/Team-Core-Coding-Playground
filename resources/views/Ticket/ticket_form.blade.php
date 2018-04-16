<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="/ticket_save">
	{!! csrf_field() !!}
Name:<input type="text" name="name"><br>
Sex<select name="sex">
  <option value="male">Male</option>
  <option value="female">Female</option>
</select>
Contact:<input type="text" name="contact">
Email:<input type="email" name="email">
<input type="submit" name="Submit">
</form>
</body>
</html>