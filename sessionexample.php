<!DOCTYPE html>
<html>
<head>
	<title>This is a test of session</title>
</head>
<body>
<form method="post" action="">
	<input type="text" name="name">
	<input type="password" name="password">
	<input type="submit" name="submit">
</form>
</body>
</html>
<?php 
session_start();
if($_POST['submit'])
{
	$name=$_POST['name'];
	$password=$_POST['password'];
	$name1 ="name";
	$password1="password";
	if($name==$name1 && $password ==$password1)
		{
			$_SESSION['2user']=$name1;
			$_SESSION['2password']=$password1;
			$_SESSION['start']=time();
			$_SESSION['expire']=$_SESSION['start']+(30*60);
			header('location : link ');
		}
		else
		{
			echo error while passing the value ;
		}
}
?>