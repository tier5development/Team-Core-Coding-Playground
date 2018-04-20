<?php
session_start();
require_once(__DIR__.'/../database/conn.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
/*$pro=$_SESSION["example"];
print_r($pro);
exit();*/
if($_POST){
	$product_name=$_SESSION["$product_name"];
	if(empty($_POST['shop_name'])){
		$shop_name_empty="Field missing";
	}
	else{
		$shop_name=test_input($_POST['shop_name']);
	}
	if(empty($_POST['shop_address'])){
		$shop_address_empty="Field missing";
	}
	else{
		$shop_address=test_input($_POST['shop_address']);
	}
	if(empty($_POST['shop_phone'])){
		$shop_phone_empty="Field missing";
	}
	else{
		$shop_phone=test_input($_POST['shop_phone']);
	}
	if(empty($_POST['product_barcode'])){
		$product_barcode_empty="Field missing";
	}
	else{
		$product_barcode=test_input($_POST['product_barcode']);
	}
	$sql="INSERT INTO shop (name,address,phone,product_barcode) VALUES ('$shop_name', '$shop_address
	', '$shop_phone','$product_barcode')";
	$sql1="INSERT INTO shop_product (shop,product,barcode) VALUES ('$shop_name','$product','$product_barcode')";
	if(empty($product)){
	mysqli_query($conn,$sql);
	/*echo "<button onclick= \"location.href='http://$_SERVER['SERVER_NAME']/ekart/backend/shop_show.php'\">show</button>";*/
	echo "success";	
	}
	else{
	mysqli_query($conn,$sql);
	mysqli_query($conn,$sql1);
	/*echo "<button onclick= \"location.href='http://$_SERVER['SERVER_NAME']/ekart/backend/shop_show.php'\">show</button>";	*/
	echo "error";
	}
/*	if (mysqli_query($conn,$sql)){
		mysqli_query($conn,$sql1);
	echo '<a href="'http:// $_SERVER['SERVER_NAME']/ekart/backend/shop.php'"/';	
	echo "<button onclick= \"location.href='http://localhost/ekart/backend/shop_show.php'\">show</button>";
	}
	else{
		echo "error";
	}*/
}
function test_input($data){
$data=trim($data);
$data=htmlspecialchars($data);
$data=stripslashes($data);
return $data;
}
?>

<!-- <!DOCTYPE html>
<html>
<body>
<h3>ADD SHOP WITH IT'S PRODUCT</h3>
<form id="form1" method="post" action="">
	<b>Shop_Name</b><input type="text" name="shop_name">
	<br><br><b>Shop_Address</b><input type="text" name="shop_address">
	<br><br><b>Shop_Phone_Number</b><input type="text" name="shop_phone">
	<br><br><b>Product_Barcode</b><input type="number" name="product_barcode">
	<br><br><b>Submit</b><input type="submit"  value="submit">
</form>
</body>
</html> -->