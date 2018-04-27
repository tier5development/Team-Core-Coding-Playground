<?php
session_start();
require_once(__DIR__.'/../database/conn.php');
require_once(__DIR__.'/../backend/functionality.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$num=$_SESSION["num"];
print_r($num);
$add_product=add_product($conn);
print_r($add_product);
exit();
?>
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
