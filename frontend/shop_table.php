<?php
require_once(__DIR__.'/../database/conn.php');
require_once(__DIR__.'/../backend/functionality.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$show_shop=show_shop($conn);
?>
<!DOCTYPE html>
<html>
<head>
<title>Shop Details</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<label align= "center"><h3>Shop Table</h3></label>
<table>
	<tr>
		<th>Name</th>
		<th>Address</th>
		<th>Phone</th>
		<th>Product_Barcode</th>
		<th colspan="3">Action</th>
	</tr>
	<tr>
	<?php if(!empty($show_shop)){?>

		<td><?php echo $show_shop['name']; ?></td>
		<td><?php echo $show_shop['address']; ?></td>
		<td><?php echo $show_shop['phone']; ?></td>
		<td><?php echo $show_shop['product_barcode']; ?></td>
		<td>
				<a href="shop.php" class="insert_btn" >Insert</a></td>
		<td>
				<a href="shop_edit.php" class="edit_btn" >Edit</a>
		</td>
		<td>
				<a href="../backend/functionality.php?functionality=<?php echo "show_modify";?>&phone=<?php echo $show_shop['phone'];?>&barcode=<?php echo $show_shop['product_barcode'];?>" class="del_btn">Delete</a>
		</td>
	<?php }else{ ?>
		<td colspan="7">NO data found </td>
	<?php } ?>
	</tr>
</table>
</body>
</html>


