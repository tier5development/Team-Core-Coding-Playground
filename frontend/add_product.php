<?php
session_start();
require_once(__DIR__.'/../database/conn.php');
require_once(__DIR__.'/../backend/functionality.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$add_product=add_product($conn);
//print_r($add_product);
$num=$_SESSION["num"];
/*print_r($add_product);
exit();*/
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
      <label for="shop_id">Product_Name</label>
        <select name= "id" id= "id" class="form-control" required>
          <option selected="selected" value="">-- Select an option --</option>

            <?php for($j=0;$j<=$num;$j++){echo "<option value='" . $add_product[$j]['shop_id'] . "'>" . $add_product[$j]['name'] . "</option>";}?>
        </select>
    </div>
    <input type="hidden" name="shop_id" value="<?= $_GET['id']?>">  
   <input type="hidden" name="functionality" value="add_shop_product">
   <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</body>
</html>
<?php } else {?>
<?php header('location:../frontend/admin_login.php');  }?>
