<?php
require_once(__DIR__.'/../database/conn.php');
require_once(__DIR__.'/../backend/functionality.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$show_shop=show_shop($conn);
$num=$_SESSION["num"];
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
		<th>Shop_ID</th>
		<th>Name</th>
		<th>Address</th>
		<th>Phone</th>
		<th></th>
		<th colspan="3">Action</th>
		<th>
				<a href="shop.php" class="insert_btn" >Add_Shop</a></td>
		<th>
	</tr>
	<tr>
	<?php if(!empty($show_shop)){?>
	<?php for($i=0;$i<=$num;$i++){?>
		<td><?php echo $show_shop[$i]['shop_id']; ?></td>
		<td><?php echo $show_shop[$i]['name']; ?></td>
		<td><?php echo $show_shop[$i]['address']; ?></td>
		<td><?php echo $show_shop[$i]['phone']; ?></td>
		<td>	
				<a href="product_shop.php" class="edit_btn" >Show_Product</a>
		</td>
		<td>
				<a href="shop_edit.php" class="edit_btn" >Edit</a>
		</td>
		<td>
				<a href="../backend/functionality.php?functionality=<?php echo "show_modify";?>&phone=<?php echo $show_shop['phone'];?>" class="del_btn">Delete</a>
		</td>
		<tr></tr>
		<?php }?>
	<?php }else{ ?>
		<td colspan="7">NO data found </td>
	<?php } ?>
	</tr>
</table>
</body>
</html>


