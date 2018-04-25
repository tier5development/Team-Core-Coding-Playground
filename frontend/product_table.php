<?php
require_once(__DIR__.'/../database/conn.php');
require_once(__DIR__.'/../backend/functionality.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$show_product=show_product($conn);
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
		<th>Barcode</th>
		<th>Name</th>
		<th>Price</th>
		<th>Brand</th>
		<th colspan="3">Action</th>
	</tr>
	<tr>
	<?php if(!empty($show_product)){?>

		<td><?php echo $show_product['barcode']; ?></td>
		<td><?php echo $show_product['name']; ?></td>
		<td><?php echo $show_product['price']; ?></td>
		<td><?php echo $show_product['brand']; ?></td>
		<td>
				<a href="product.php" class="insert_btn" >Insert</a></td>
		<td>
				<a href="product_edit.php" class="edit_btn" >Edit</a>
		</td>
		<td>
				<a href="../backend/functionality.php?functionality=<?php echo "product_modify";?>&barcode=<?php echo $show_product['barcode'];?>" class="del_btn">Delete</a>
		</td>
	<?php }else{ ?>
		<td colspan="7">NO data found </td>
	<?php } ?>
	</tr>
</table>
</body>
</html>

