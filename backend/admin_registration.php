<?php
require_once(__DIR__.'/../database/conn.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
if($_POST){
	if(empty($_POST)){
		$name_empty="Missing Field";
	}else{
		/*$name=test_input($_POST['name']);*/
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      echo ("<script LANGUAGE='JavaScript'> window.alert('Please give another unique name');window.location.href='http://localhost/ekart/backend/admin_registration.php';</script>"); 
    }
    else{
    	$name=test_input($_POST['name']);
    }
	}if (empty($_POST['email'])) {
		$email_empty="Missing Field";
	}else{
		/*$email=test_input($_POST['email']);*/
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      echo ("<script LANGUAGE='JavaScript'> window.alert('Please give another unique email');window.location.href='http://localhost/ekart/backend/admin_registration.php';</script>"); 
    }
    else{
    	$email=test_input($_POST['email']);
    }
	}if (empty($_POST['password'])) {
		$_password="Missing Field";
	}else{
		$password=test_input(md5($_POST['password']));

	}
	$sql="INSERT INTO admin_registration (name,email,password) VALUES ('$name', '".mysqli_real_escape_string($conn,$email)."' ,  '".mysqli_real_escape_string($conn,$password)."')";
	if(mysqli_query($conn,$sql)){
	header("Location:http://".$_SERVER['SERVER_NAME']."/ekart/backend/admin_login.php");
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
<!DOCTYPE>
<html>
<head>
	<title>Admin_Registration</title>
</head>
<body>
<h3>Admin_Registration</h3>
<form id="form1" method="post" action="">
	<b>Name</b><input type="text" name="name" placeholder="Name" required>
	<br><br><b>Email</b><input type="text" name="email" placeholder="Email" required>
	<br><br><b>Password</b><input type="password" name="password" placeholder="Password" required
	<br><br><input type="submit" name="submit">
</form>
</body>
</html>