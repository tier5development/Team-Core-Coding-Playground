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


<!-- <table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table> -->