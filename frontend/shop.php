<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>ADD SHOP WITH IT'S PRODUCT_BARCODE</h2>
  <form id="form1" method="post" action="../backend/functionality.php" >
    <div class="form-group">
      <label for="shop_name">Shop_Name:</label>
      <input type="text" class="form-control" id="shop_name" placeholder="shop_name" required autocomplete="off" name="shop_name">
    </div>
    <div class="form-group">
      <label for="shop_address">Shop_Address</label>
      <input type="text" class="form-control" id="shop_address" placeholder="shop_address" required autocomplete="off" name="shop_address">
    </div>
    <div class="form-group">
      <label for="shop_phone">Shop_Phone_Number</label>
      <input type="number" class="form-control" id="shop_phone" placeholder="shop_phone" required autocomplete="off" name="shop_phone">
    </div>
    <input type="hidden" name="functionality" value="shop">
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
