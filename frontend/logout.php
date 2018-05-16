<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$user='';
if(!empty($_POST) || !empty($_GET))
{
	if(isset($_POST["name"])){
		$user=$_POST["name"];
	}
	elseif (isset($_GET["name"])) {
		$user=$_GET["name"];
	}
}
switch ($user) {
	case 'logout_user':
		logout_user();
		break;
	case 'logout_admin':
		logout_admin();
		break;
	default:
		#code...
		break;
}

function logout_user(){
session_start();
session_unset($_SESSION["user_id"]);
header('location:../frontend/user_login.php');
}
function logout_admin(){
session_start();
session_unset($_SESSION["page_id"]);
header('location:../frontend/admin_login.php');	
}

?>