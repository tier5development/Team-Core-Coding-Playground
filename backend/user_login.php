<?php
require_once(__DIR__.'/../database/conn.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
if($_POST){
	if (empty($_POST['email'])) {
		$email_empty="Missing Field";
	}else{
		$email=test_input($_POST['email']);
	}if (empty($_POST['password'])) {
		$_password="Missing Field";
	}else{
		$password=test_input($_POST['password']);
	}
	$sql="SELECT * FROM `user_registration` WHERE `email` LIKE '".$email."' AND `password` LIKE '".$password."'";
	echo $sql ;
	$result = mysqli_query($conn,$sql);
	print_r($result);
	/*$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['active'];*/
  $count = mysqli_num_rows($result);
	if($count == 1){
	/*header("Location:http://"$_SERVER['SERVER_NAME']"/ekart/backend/admin.php");*/
	echo "success";
	}
	else{
		/*header("Location: http://$_SERVER['SERVER_NAME']/ekart/backend/admin_registration.php");*/
		echo "error";
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
	<title>User_login</title>
</head>
<body>
<h3>User_login</h3>
<form id="form1" method="post" action="">
	<br><br><b>Email</b><input type="text" name="email" placeholder="Email" required>
	<br><br><b>Password</b><input type="password" name="password" placeholder="Password" required>
	<br><br><input type="submit" name="submit">
</form>
</body>
</html>