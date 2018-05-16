<?php
session_start();
require_once(__DIR__.'/../database/conn.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$functionality = '';
if(!empty($_POST) || !empty($_GET)){
	if(isset($_POST["functionality"])){
		$functionality=$_POST['functionality'];
	}
	elseif(isset($_GET["functionality"])){ 
		$functionality=$_GET['functionality'];
	}
}
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
	case 'show_modify';
		if($_GET['phone']){
			$phone=$_GET['phone'];
		}
		show_modify($conn,$phone);
		break;
	case 'product_modify':
	 	if($_GET['barcode'] && $_GET['product_id']){
	 		$barcode=$_GET['barcode'];
	 		$product_id=$_GET['product_id'];
	 	}
	 	product_modify($conn,$barcode,$product_id);
	 	break;
	case 'product_edit':
	 	product_edit($conn);
	 	break;
	case 'shop_edit':
	  shop_edit($conn);
	  break;
	case 'admin_login':
		admin_login($conn);
		break;
	case 'add_shop_product':
		add_shop_product($conn);
	default:
		break;
}
function user_registration($conn=null){
	print_r($_POST);
	if(ValidateUserRegistration()){
		$name=$_POST['name'];
		$_SESSION['name']=$name;
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql="INSERT INTO user_registration (name,email,password) VALUES ('$name', '".mysqli_real_escape_string($conn,$email)."', '".mysqli_real_escape_string($conn,$password)."')";
		$sql1="SELECT * FROM `user_registration` WHERE `email` LIKE '".$email."'";
		$result=mysqli_query($conn,$sql1);
		$count=mysqli_num_rows($result);
		if($count > 0){
			echo "Email already present";
			header('location : ../frontend/user_registration.php');
		}
		else{
			mysqli_query($conn,$sql);
			header('location: ../frontend/user_login.php');
		}
	}
	else{
		echo "error_in_validation";
	}
	$conn=null;
}
function user_login($conn=null){
	if(ValidateUserLogin()){
		$user_id=$_POST['user_id'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql="SELECT * FROM `user_registration` WHERE `email` LIKE '".$email."' AND `password` LIKE '".$password."'";
		$result=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		if($count == 1){
			$_SESSION['user_id']=$user_id;
			header('location: ../frontend/dashboard.php');
		}
		else{
			echo "wrong information";
			header('location : ../frontend/user_registration.php');
		}
	}
	else{
		echo "error_in_validation";
	}
	$conn=null;
}
function admin_login($conn=null){
	if(ValidateAdminLogin()){
		$id=$_POST['page_id'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql="SELECT * FROM `admin_registration` WHERE `email` LIKE '".$email."' AND `password` LIKE '".$password."'";
		$result=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		if($count == 1){
			/*echo "success";*/
			$_SESSION["page_id"]=$id;
			header('location:../frontend/admin.php');
		}
		else{
			echo "error";
		}
	}
	else{
		echo "error_in_validation";
	}
	$conn=null;
}
function shop($conn=null){
	if(ValidateShop()){
		$product=$_SESSION["product_name"];
		$shop_name=$_POST['shop_name'];
		$shop_address=$_POST['shop_address'];
		$shop_phone=$_POST['shop_phone'];
		$_SESSION["phone_update"]=$shop_phone;
		$sql="INSERT INTO shop (name,address,phone) VALUES ('$shop_name', '$shop_address', '$shop_phone')";
		if(mysqli_query($conn,$sql)){
			$shop_id=mysqli_insert_id($con);
			$_SESSION["last_inserted_id_shop"]=$shop_id;
			header('location:../frontend/shop_table.php');
		}
		else{
			echo "error in insertion into shop database";
		}
	}
	else{
		echo "error_in_validation";
		header('location:../frontend/shop_table.php');
	}
	$conn=null;
}
function product($conn=null){
	if(ValidateProduct()){
		$product_barcode=$_POST['product_barcode'];
		$_SESSION["update_product_barcode"]=$product_barcode;
		$product_name=$_POST['product_name'];
		$_SESSION["product_name"]=$product_name;
		$product_price=$_POST['product_price'];
		$product_brand=$_POST['product_brand'];
		$shop_id=$_POST['shop_id'];
		$_SESSION["shop_id"]=$shop_id;
		$sql="INSERT INTO product (shop_id,barcode,name,price,brand) VALUES ('$shop_id','$product_barcode','$product_name', '$product_price','$product_brand')";
		
		if (mysqli_query($conn,$sql)){
			 $last_id = mysqli_insert_id($conn);
			 $_SESSION["product_id"]=$last_id;
			 $sql1="INSERT INTO shop_product (shop_id , product_id ) VALUES ('$shop_id' ,'$last_id')";
			 if(mysqli_query($conn,$sql1)){
			header('location:../frontend/product_table.php'); 	
			 }
			 else{
			 			echo "error";
					}
			  }
		else{
			echo "error";
		}
	}
	else{
		echo "error_in_validation";
		session_destroy();
		$_SESSION["fail"]="Result not submited ";
		header('location:../frontend/product_table.php');
	}
	$conn=null;
}
function show_modify($conn=null,$phone){
	if(ValidateShopModify($phone)){
		$sql="DELETE FROM shop WHERE phone = '$phone'";
		if(mysqli_query($conn,$sql)){		
			header('location:../frontend/shop_table.php');
		}
		else{
			echo "error";
		}
	}
	else{
		echo "error_in_validation";
		header('location:../frontend/shop_table.php');
	}
	$conn=null;
}
function product_modify($conn=null,$barcode,$product_id){
	if(ValidateProductModify($barcode,$product_id)){
		$sql="DELETE FROM shop_product WHERE product_id ='".$product_id."'";
		$sql1="DELETE FROM product  WHERE barcode = '".$barcode."'";
		if(mysqli_query($conn,$sql)){
			if(mysqli_query($conn,$sql1)==true){
				header('location:../frontend/product_table.php');	
			}
			else{
				mysqli_query($conn,$sql);
			header('location:../frontend/product_table.php');		
			}
		}
		else{
			echo "error";
		}
	}
	else{
		echo "error_in_validation";
		header('location:../frontend/product_table.php');
	}
	$conn=null;
}
function shop_edit($conn){
	if(ValidateShopEdit()){
		$shop_name=$_POST['shop_name'];
		$shop_address=$_POST['shop_address'];
		$shop_phone=$_POST['shop_phone'];
		$phone=$_SESSION["phone_update"];	
		$sql="UPDATE shop SET name='$shop_name', address='$shop_address' , phone='$shop_phone'  WHERE phone = '".$phone."'";
		if(mysqli_query($conn,$sql)){
			header('location:../frontend/shop_table.php');
		}
		else{
			echo "error";
		}	
	}
	else{
		echo "error_in_validation";
		/*header('location:../frontend/shop_table.php');*/
	}
	$conn=null;
}
function product_edit($conn){
	if(ValidateProductEdit()){
		$product_barcode=$_POST['product_barcode'];
		$product_name=$_POST['product_name'];
		$_SESSION["product_name"]=$product_name;
		$product_price=$_POST['product_price'];
		$product_brand=$_POST['product_brand'];
		$shop_id=$_POST['shop_id'];
		$id=$_SESSION["shop_id"];
		$product_id=$_SESSION["product_id"];
		$barcode=$_SESSION["update_product_barcode"];
		$sql="UPDATE product SET barcode='$product_barcode' , name='$product_name' , price='$product_price' ,brand='$product_brand' ,shop_id='$shop_id' WHERE barcode='$barcode'";
		$sql1="UPDATE shop_product SET shop_id='$shop_id' , product_id ='$product_id'  WHERE shop_id ='$id'";
		if(mysqli_query($conn,$sql)){
			if(mysqli_query($conn,$sql1)==true){
				header('location:../frontend/product_table.php');
			}
			else{
				echo "error";
			}
		}
		else{
			echo "error";
		}
	}
	else{
		echo "error_in_validation";
		header('location:../frontend/product_table.php');
	}
	$conn =null;
}
function add_shop_product($conn=null){
	extract($_POST);
	$sql="INSERT INTO `shop_product`(`shop_id`, `product_id`) VALUES ($id ,$shop_id)";
	if(mysqli_query($conn,$sql))
	{
		echo "success";
	}
	else{
		echo "error".mysqli_error($conn);
	}
	
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
	if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['user_id'])) {
		return true;
	}
	else{
		return false;
	}
}
function ValidateAdminLogin(){
	if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['page_id'])) {
		return true;
	}
	else{
		return false;
	}
}
function ValidateShop(){
		if (isset($_POST['shop_name']) && isset($_POST['shop_address']) && isset($_POST['shop_phone'])) {
			return true;
		}
	else{
		return false;
	}
}
function ValidateProduct(){
	if(isset($_POST['product_barcode']) && isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_brand']) && isset($_POST['shop_id'])){
		return true;
	}
	else{
		return false;
	}
}
function ValidateShopModify($phone){
	if (isset($phone)) {
			return true;
		}
	else{
		return false;
	}
}
function ValidateProductModify($barcode,$product_id){
	if (isset($barcode) && isset($product_id)) {
			return true;
		}
	else{
		return false;
	}
}
function ValidateShopEdit(){
	if (isset($_POST['shop_name']) && isset($_POST['shop_address']) && isset($_POST['shop_phone'])) {
			return true;
		}
	else{
		return false;
	}
}
function ValidateProductEdit(){
	if (isset($_POST['product_barcode']) && isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_brand'])) {
		return true;
	}
	else{
		return false;
	}
}
    	
function show_product($conn=null){
	$sql="SELECT * FROM product";
	$result=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($result);
	$_SESSION["num"]=$num;
	$show_product=array();
	if (mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
    	array_push($show_product,$row);
    }
  }
  return ($show_product);
}
function add_product($conn=null){//query missing 
	/*$sql="SELECT product.shop_id product.product_id FROM product UNION ALL SELECT shop_product.shop_id, shop_product.product_id FROM shop_product";*/
	$sql="SELECT * FROM product ";
	$result=mysqli_query($conn,$sql);
	$add_product=array();
	$num=mysqli_num_rows($result);
	$_SESSION["num"]=$num;
	$row=mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) > 0 ){
		while($row = mysqli_fetch_assoc($result)){
			array_push($add_product,$row);
		}
	}
	else{
		echo "error";
		exit();
	}
	return ($add_product);
}
	function show_shop($conn=null){
	$sql="SELECT * FROM shop";
	$result=mysqli_query($conn,$sql);
	$show_shop=array();
	$num=mysqli_num_rows($result);
	$_SESSION["num"]=$num;
	if (mysqli_num_rows($result) > 0) {
  	  while($row = mysqli_fetch_assoc($result)){
  	  	array_push($show_shop,$row);
  	  }
  	}
  	else{
  		echo "error";
  		exit();
  	}
  	return ($show_shop);
}
function shop_id($conn=null){
	$sql="SELECT * FROM shop";
	$result=mysqli_query($conn,$sql);
	$show_shop_id=array();
	$num=mysqli_num_rows($result);
	$_SESSION["num"]=$num;
	$row=mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) > 0 ){
		while($row = mysqli_fetch_assoc($result)){
			array_push($show_shop_id, $row);
		}
	}
	return ($show_shop_id);
}
function show_product_detail($conn,$id){
	 $sql="SELECT product.name , product.price , product.brand , product.barcode , shop.name, shop.address, shop.phone  FROM product AS product LEFT JOIN shop AS shop ON product.shop_id = shop.shop_id WHERE product.shop_id=$id";

	$result=mysqli_query($conn,$sql);
	$show_product_detail=array();
	$num=mysqli_num_rows($result);
	$_SESSION["num"]=$num;
	if(mysqli_num_rows($result) > 0 ){
		while($row = mysqli_fetch_assoc($result)){
		//$show_product_detail=$row;
		array_push($show_product_detail,$row);
		}
	}
	return ($show_product_detail);
}
?>