<?php
require_once(__DIR__.'/../iniseterror.php');
require_once(__DIR__.'/../database/database_connection.php');
$functionality = $_POST['functionality'];
switch ($functionality) {
	case 'signup':
		signup($db);
		break;
	case 'login' : 
		login($db);
		break;
	default:
		logout();
		break;
}

/**
 * This function sign one user up
 * @param  $db [description]
 * @return mull
 */
function signup($db = null) {
	session_start();
	if (validateSignupRequest()) {
		$f_name  = $_POST['f_name'];
		$l_name  = $_POST['l_name'];
		$email   = $_POST['email'];
		$password= $_POST['password'];
		$sql = "SELECT `email` FROM `signedup` WHERE `email` LIKE '".$email."'";
		$statement = $db->prepare($sql);
		$result = $statement->execute();
		$count  = $statement->fetchAll();
		if($count == 0){			
			$sql = "INSERT INTO `signedup` (`f_name`, `l_name`, `email`, `password`, `created_at`, `updated_at`) VALUES ('".$f_name."', '".$l_name."', '".$email."', '".$password."', NOW(), NOW())";
			$statement = $db->prepare($sql);
			$result = $statement->execute();
			if ($result) {
				$_SESSION['f_name'] = $f_name;
				$_SESSION['l_name'] = $l_name;
				$_SESSION['email'] = $email;
				$_SESSION['success'] = 'Successfully logged in!';
				header('Location: ../dashboard.php');
			} else {
				$_SESSION['fail'] = 'Failed to login!';
				header('Location: ../index.php');
			}
		}else{
			$_SESSION['fail'] = 'Failed to login!';
				header('Location: ../index.php');
		}
	} else {
		$_SESSION['fail'] = 'Missing params, failed to signup!';
		header('Location: ../index.php');
	}
	// close connection
	$db = null;
}
/**
 * This function log user in
 * @param  $db 
 * @return null
 */
function login($db = null) {
	session_start();
	if (validateLoginRequest($db)) {
		$email   = $_POST['email'];
		$password= $_POST['password'];
		$sql = "SELECT * FROM `signedup` WHERE `email` LIKE '".$email."' AND `password` LIKE '".$password."'";
		$statement = $db->prepare($sql);
		$result = $statement->execute();
		if ($result) {
			$resultset = $statement->fetch();
			$_SESSION['f_name'] = $resultset['first_name'];
			$_SESSION['l_name'] = $resultset['last_name'];
			$_SESSION['email'] = $resultset['email'];
			$_SESSION['success'] = 'Successfully logged in!';
			header('Location: ../dashboard.php');
		} else {
			session_destroy();
			$_SESSION['fail'] = 'Failed to login!';
			header('Location: ../index.php');
		}
	} else {
		session_destroy();
		$_SESSION['fail'] = 'Failed to login!';
		header('Location: ../index.php');
	}
	// close connection
	$db = null;
}

/**
 * This function log user out
 * @return null
 */
function logout() {
	session_start();
	session_destroy();
	header('Location: ../index.php');
}

/**
 * This function validate registration process request
 * @return boolean 
 */
function validateSignupRequest() {

	/*$sql = "SELECT `email` FROM `signedup` WHERE `email` LIKE '".$_POST['email']."'";
		$statement = $db->prepare($sql);
		$result = $statement->execute();
		$emailPrev  = $statement->fetch();*/
	if ($_POST['f_name'] && $_POST['l_name'] && $_POST['email'] && $_POST['password']) {
        /*if($emailPrev != $_POST['email']){
        	return true;
		}else{
			header('Location: ../fail.php');
		}*/
		return true;
	} else {
		return false;
	}
}
function validateLoginRequest() {
	if ($_POST['email'] && $_POST['password']) {
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
