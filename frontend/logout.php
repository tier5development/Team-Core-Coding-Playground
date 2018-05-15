<?php
session_start();
session_unset($_SESSION["page_id"]);
header('location:../frontend/admin_login.php'); 
?>