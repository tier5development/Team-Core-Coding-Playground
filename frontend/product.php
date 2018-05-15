<?php
session_start();
require_once(__DIR__.'/../database/conn.php');
require_once(__DIR__.'/../backend/functionality.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$show_shop_id=shop_id($conn);
$num=$_SESSION["num"];
?>
<?php if(isset($_SESSION["page_id"])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>ADD PRODUCT</h2>
  <form id="form2" method="post" action="../backend/functionality.php" >
    <div class="form-group">
      <label for="product_barcode">Product_Barcode:</label>
      <input type="number" class="form-control" id="product_barcode" placeholder="product_barcode" required autocomplete="off" name="product_barcode">
    </div>
    <div class="form-group">
      <label for="product_name">Product_Name</label>
      <input type="text" class="form-control" id="product_name" placeholder="product_name" required autocomplete="off" name="product_name">
    </div>
    <div class="form-group">
      <label for="product_price">Product_Price</label>
      <input type="number" class="form-control" id="product_price" placeholder="product_price" required autocomplete="off" name="product_price">
    </div>
    <div class="form-group">
      <label for="product_brand">Product_Brand</label>
      <input type="text" class="form-control" id="product_brand" placeholder="product_brand" required autocomplete="off" name="product_brand">
    </div>
    <div class="form-group">
      <label for="shop_id">Shop_Name</label>
        <select name= "shop_id" id= "shop_id" class="form-control" required>
          <option selected="selected" value="">-- Select an option --</option>

            <?php for($j=0;$j<=$num;$j++){echo "<option value='" . $show_shop_id[$j]['shop_id'] . "'>" . $show_shop_id[$j]['name'] . "</option>";}?>
        </select>
    </div>
    <input type="hidden" name="functionality" value="product">
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
<?php } else {?>
<?php header('location:../frontend/admin_login.php');  }?>
