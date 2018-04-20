<?php 
session_start();
require_once(__DIR__.'/../database/conn.php');
ini_set('display_errors', 1);
error_reporting(E_ALL); 
/*$_SESSION["example"]="email@example.com";
$product=$_SESSION["example"];
print_r($product);
exit();*/
if($_POST){

	if (empty($_POST['product_barcode'])) {
		$product_barcode_empty="Field missing";
	}
	else{
		$product_barcode=test_input($_POST['product_barcode']);
		$_SESSION["$product_barcode"] = $product_barcode;
	}
	if (empty($_POST['product_name'])) {
		$product_name_empty="Field missing";
	}
	else{
		$product_name=test_input($_POST['product_name']);
		$_SESSION["$product_name"]=$product_name;
	}
	if (empty($_POST['product_price'])) {
		$product_price_empty="Field missing";
	}
	else{
		$product_price=test_input($_POST['product_price']);
		$_SESSION["$product_price"]=$product_price;
	}
	if (empty($_POST['product_brand'])) {
		$product_brand_empty="Field missing";
	}
	else{
		$product_brand=test_input($_POST['product_brand']);
		$_SESSION["$product_brand"]=$product_brand;
	}
	
	$sql="INSERT INTO product (barcode,name,price,brand) VALUES ('$product_barcode', '$product_name
	', '$product_price','$product_brand')";
	if (mysqli_query($conn,$sql)){
	/*echo '<a href="http://localhost/ekart/backend/product_show.php">google<a/>';*/	
	echo "<button onclick= \"location.href='http://$_SERVER['SERVER_NAME']/ekart/backend/product_show.php'\">show</button>";
	}
	else{
		echo "error";
	}
}
function test_input($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

?>
