<?php
require_once(__DIR__.'/../database/conn.php');
require_once(__DIR__.'/../backend/functionality.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$show_product=show_product($conn);
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
		<th>Product_ID</th>
		<th>Barcode</th>
		<th>Name</th>
		<th>Price</th>
		<th>Brand</th>
		<th colspan="3">Action</th>
		<td>
			  <a href="product.php" class="edit_btn" >Insert</a></td>
		<td>
	</tr>
	<tr>
	<?php if(!empty($show_product)){?>
	<?php for($i=0;$i<$num;$i++){?>
		<td><?php echo $show_product[$i]['id']; ?></td>
		<td><?php echo $show_product[$i]['name']; ?></td>
		<td><?php echo $show_product[$i]['price']; ?></td>
		<td><?php echo $show_product[$i]['brand']; ?></td>
		<td>
				<a href="product_edit.php" class="edit_btn" >Edit</a>
		</td>
		<td>
				<a href="../backend/functionality.php?functionality=<?php echo "product_modify";?>&barcode=<?php echo $show_product[$i]['barcode'];?>&product_id=<?php echo $show_product[$i]['id'];?>" class="del_btn">Delete</a>
		</td>
		<tr></tr>
		<?php 	 }  ?>
	<?php }else{ ?>
		<td colspan="7">NO data found </td>
	<?php } ?>
	</tr>
</table>
</body>
</html>

