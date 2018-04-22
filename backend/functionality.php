<?php
require_once(__DIR__.'/../database/conn.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$functionality=$_POST['functionality'];
switch ($functionality) {
	case 'user_registration':
		user_registration($conn);
		break;
	case 'user_login':
		user_login($conn);
		break;
	case 'admin_login':	
		admin_login($conn);
		break;
	case 'shop':
		shop($conn);
		break;
	case 'product':
		product($conn);
		break;
	case 'show_modify':
		show_modify($conn);
	case 'product_modify':
		 product_modify($conn);
	case 'shop_edit':
		 shop_edit($conn);
	case 'shop_edit':
		  shop_edit($conn);
	default:
	case 'admin_login':
		admin_login($conn);
		break;
}
function user_registration($conn=null){
//session_start();
if(ValidateUserRegistration()){
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$sql="INSERT INTO user_registration (name,email,password) VALUES ('$name', '".mysqli_real_escape_string($conn,$email)."', '".mysqli_real_escape_string($conn,$password)."')";
$sql1="SELECT * FROM `user_registration` WHERE `email` LIKE '".$email."'";
$result=mysqli_query($conn,$sql1);
$count=mysqli_num_rows($result);
if($count > 0){
	//$_SESSION["Email_Meassage"]="Email already exit";	
	echo "Email already present";
}
else{
	mysqli_query($conn,$sql);
	header('location: ../frontend/user_login.html');
}
}
else{
	//session_destroy();
	//$_SESSION["fail"]="Failed to register";
	//header('location: #')
}
$conn=null;
}
function user_login($conn=null){
//session_start();
if(ValidateUserLogin()){
$email=$_POST['email'];
$password=$_POST['password'];
$sql="SELECT * FROM `user_registration` WHERE `email` LIKE '".$email."' AND `password` LIKE '".$password."'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count == 1){
	echo "success";
}
else{
	echo "wrong information";
}
}
else{
	//session_destroy();
	//$_SESSION["fail"]="Failed to login ";
}
$conn=null;
}
function admin_login($conn=null){
	//session_start();
	if(ValidateAdminLogin()){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql="SELECT * FROM `admin_registration` WHERE `email` LIKE '".$email."' AND `password` LIKE '".$password."'";
		$result=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		if($count == 1){
		echo "success";
		header('location:');
	}
	else{
		echo "error";
	}
}
else{
    //session_destroy();
	//$_SESSION["fail"]="Failed to login ";
}
$conn=null;
}
function shop($conn=null){
	session_start();
	if(ValidateShop()){
		$product=$_SESSION["product_name"];
		$shop_name=$_POST['shop_name'];
		$shop_address=$_POST['shop_address'];
		$shop_phone=$_POST['shop_phone'];
		$product_barcode=$_POST['product_barcode'];
		$sql="INSERT INTO shop (name,address,phone,product_barcode) VALUES ('$shop_name', '$shop_address', '$shop_phone','$product_barcode')";
		$sql1="INSERT INTO shop_product (shop,product,barcode) VALUES ('$shop_name','$product','$product_barcode')";
		if(empty($product)){
			mysqli_query($conn,$sql);
			show_shop($conn);
		}
		else{
			mysqli_query($conn,$sql);
			mysqli_query($conn,$sql1);
			show_shop($conn);
		}
	
}
else{
    session_destroy();
	$_SESSION["fail"]="Failed to login ";
}
$conn=null;
}
function product($conn=null){
	session_start();
	if(ValidateProduct()){
		$product_barcode=$_POST['product_barcode'];
		$product_name=$_POST['product_name'];
		$_SESSION["product_name"]=$product_name;
		$product_price=$_POST['product_price'];
		$product_brand=$_POST['product_brand'];
		$sql="INSERT INTO product (barcode,name,price,brand) VALUES ('$product_barcode', '$product_name', '$product_price','$product_brand')";
		if (mysqli_query($conn,$sql)){
			/*echo '<a href="http://localhost/ekart/backend/product_show.php">google<a/>';*/	
			/*echo "<button onclick= \"location.href='http://$_SERVER['SERVER_NAME']/ekart/backend/product_show.php'\">show</button>";*/
			/*echo "success";*/
			show_product($conn);
		}
	else{
		echo "error";
	}
}
else{
	session_destroy();
	$_SESSION["fail"]="Result not submited ";	
}
$conn=null;
}
function show_modify($conn=null){
	session_start();
	if(ValidateShopModify()){
		$shop_phone=$_POST['shop_phone'];
		$product_barcode=$_POST['product_barcode'];
		$sql="DELETE FROM shop WHERE phone = '$shop_phone'";
		$sql1="DELETE FROM shop_product WHERE  product_barcode=$product_barcode";
		if(mysqli_query($conn,$sql)){
			mysqli_query($conn,$sql1);
			show_shop($conn);		
		}
		else{
			echo "error";
		}
	}
	else{
	session_destroy();
	$_SESSION["fail"]="Result not submited ";
	}
	$conn=null;
}
function product_modify($conn=null){
	session_start();
	if(ValidateProductModify()){
		$product_barcode=$_POST['product_barcode'];
		$sql="DELETE FROM product WHERE barcode = '$product_barcode'";
		if(mysqli_query($conn,$sql)){
			show_product($conn);
		}
		else{
			echo "error";
		}
	}
	else{
	session_destroy();
	$_SESSION["fail"]="Result not submited ";
	}
	$conn=null;
}
function shop_edit($conn){
	session_start();
	if(ValidateShopEdit()){
		//$product=$_SESSION["product_name"];
		$shop_name=$_POST['shop_name'];
		$shop_address=$_POST['shop_address'];
		$shop_phone=$_POST['shop_phone'];
		$product_barcode=$_POST['product_barcode'];	
		$sql="UPDATE shop SET name='$shop_name', address='$shop_address' , phone='$shop_phone' , product_barcode ='$product_barcode' WHERE product_barcode = '$product_barcode'";
		if(mysqli_query($conn,$sql)){
			show_shop($conn);
		}
		else{
			echo "error";
		}	
	}
	else{
	session_destroy();
	$_SESSION["fail"]="Result not submited ";
	}
	$conn=null;
}
function ValidateUserRegistration(){
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
		return true;
	}
		else{
			return false;
		}
	
}
function ValidateUserLogin(){
	if (isset($_POST['email']) && isset($_POST['password'])) {
		return true;
	}
	else{
		return false;
	}
}
function ValidateAdminLogin(){
	if (isset($_POST['email']) && isset($_POST['password'])) {
		return true;
	}
	else{
		return false;
	}
}
function ValidateShop(){
		if (isset($_POST['shop_name']) && isset($_POST['shop_address']) && isset($_POST['shop_phone']) && isset($_POST['product_barcode'])) {
			return true;
		}
	else{
		return false;
	}
}
function ValidateProduct(){
	if(isset($_POST['product_barcode']) && isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_brand'])){
		return true;
	}
	else{
		return false;
	}
}
function ValidateShopModify(){
	if (isset($_POST['shop_phone']) && isset($_POST['product_barcode'])) {
			return true;
		}
	else{
		return false;
	}
}
function ValidateProductModify(){
	if (isset($_POST['product_barcode'])) {
			return true;
		}
	else{
		return false;
	}
}
function ValidateShopEdit(){
	if (isset($_POST['shop_name']) && isset($_POST['shop_address']) && isset($_POST['shop_phone']) && isset($_POST['product_barcode'])) {
			return true;
		}
	else{
		return false;
	}
}
function show_product($conn=null){
	$sql="SELECT * FROM product";
	$result=mysqli_query($conn,$sql);

	if (mysqli_num_rows($result) > 0) {
   	 // output data of each row
  	 echo "<table border>";
    	while($row = mysqli_fetch_assoc($result)) {
    		
      	  echo "<tr><th>Barcode</th><th>Name</th><th>Price</th><th>Brand</th></tr><tr><td>" . $row['barcode'] . "</td><td>" . $row['name'] . "</td><td>" . $row['price'] . "</td><td>" . $row['brand'] . "</td></tr>";
      	  /*echo $row['barcode'] . " " . $row['name'];*/
         
    }
    echo "</table>";
    echo("<button onclick=\"location.href='../frontend/product.html'\">Add_More</button>");
     echo("<button onclick=\"location.href='../frontend/product_modify.html'\">Delete_Shop_Details</button>");
}
}
function show_shop($conn=null){
	$sql="SELECT * FROM shop";
	$result=mysqli_query($conn,$sql);

	if (mysqli_num_rows($result) > 0) {
   	 // output data of each row
	 	//echo "<link rel='stylesheet' type='text/css' href='css/style.css' />";
 		echo "<table border>";
  	  while($row = mysqli_fetch_assoc($result)) {
   	 		
    	    echo "<tr><th>Name</th><th>Address</th><th>Phone</th><th>Product_Barcode</th></tr><tr><td>" . $row['name'] . "</td><td>" . $row['address'] . "</td><td>" . $row['phone'] . "</td><td>" . $row['product_barcode'] . "</td></tr>";
     	   /*echo $row['barcode'] . " " . $row['name'];*/
         
    }
    echo "</table>";
    echo("<button onclick=\"location.href='../frontend/shop.html'\">Add_More</button>");
    echo("<button onclick=\"location.href='../frontend/shop_edit.html'\">Edit_Shop_Details</button>");
    echo("<button onclick=\"location.href='../frontend/shop_modify.html'\">Delete_Shop_Details</button>");
}
}
?>