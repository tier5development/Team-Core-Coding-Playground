<?php
require_once(__DIR__.'/../database/conn.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
if($_POST){
	if(empty($_POST)){
		$name_empty="Missing Field";
	}else{
		$name=test_input($_POST['name']);
	}if (empty($_POST['email'])) {
		$email_empty="Missing Field";
	}else{
		$email=test_input($_POST['email']);
	}if (empty($_POST['password'])) {
		$_password="Missing Field";
	}else{
		$password=test_input(md5($_POST['password']));
	}
	$sql="INSERT INTO user_registration (name,email,password) VALUES ('$name', '".mysqli_real_escape_string($conn,$email)."', '".mysqli_real_escape_string($conn,$password)."')";
	$sql1="SELECT * FROM `user_registration` WHERE `email` LIKE '".$email."'";
	$result=mysqli_query($sql1);
	$count=mysqli_num_rows($result);
	if($count) 
	if(mysqli_query($conn,$sql)){
	/*header("Location: ekart/backend/admin.php");*/

	echo "success";
	}
	else{
		echo "Registration not sucessful";
	}
}
function test_input($data){
	$data=trim($data);
	$data=htmlspecialchars($data);
	$data=stripslashes($data);
	return $data;
}

?>
<!DOCTYPE >
<html>
<head>
	<title></title>
</head>
<h3>User_Registration</h3>
<body>
<form id="form1" method="post" action="">
	<b>Name</b><input type="text" name="name" placeholder="Name" required>
	<br><br><b>Email</b><input type="text" name="email" placeholder="Email" required>
	<br><br><b>Password</b><input type="password" name="password" placeholder="Password" required>
	<br><br><input type="submit" name="submit">
</form>
</body>
</html>