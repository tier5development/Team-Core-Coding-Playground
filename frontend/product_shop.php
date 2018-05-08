<?php
require_once(__DIR__.'/../database/conn.php');
require_once(__DIR__.'/../backend/functionality.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$show_product=show_product_detail($conn);
$num=$_SESSION["num"];

?>
<!DOCTYPE html>
<html>
<head>
<title>Product Details</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<label align= "center"><h3>Product Table</h3></label>
<table>
	<tr>
		<th>Product_Name&nbsp;</th>
		<th>Product_Price&nbsp;&nbsp;</th>
		<th>Product_Brand&nbsp;&nbsp;</th>
		<th>Product_Barcode&nbsp;&nbsp;</th>
		<th>Shop_Name&nbsp;&nbsp;</th>
		<th>Shop_Address&nbsp;&nbsp;</th>
		<th>Shop_Phone&nbsp;&nbsp;</th>
		<!-- <th colspan="3">Action&nbsp;&nbsp;</th> -->
		<!-- add product class is not maintained in css -->
		<td>	
				<a href="add_product.php" class="edit_btn" >Show_Product</a>
		</td>
		<td>
				<a href="shop_table.php" class="back_btn" >Back</a>
		</td>
	</tr>
	<tr>
	<?php if(!empty($show_product)){?>
	<?php for($i=0;$i<$num;$i++){?>
		<td><?php echo $show_product[$i]['name']; ?></td>
		<td><?php echo $show_product[$i]['price']; ?></td>
		<td><?php echo $show_product[$i]['brand']; ?></td>
		<td><?php echo $show_product[$i]['barcode']; ?></td>
		<td><?php echo $show_product[$i]['name']; ?></td>
		<td><?php echo $show_product[$i]['address']; ?></td>
		<td><?php echo $show_product[$i]['phone']; ?></td>
		<tr></tr>
	<?php }?>
	<?php }else{ ?>
		<td colspan="6">NO data found </td>
	<?php } ?>
	</tr>
</table>
</body>
</html>

