<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>DELETE PRODUCT DETAILS</h2>
  <form id="form1" method="post" action="../backend/functionality.php" >
    <div class="form-group">
      <label for="product_barcode">Product_Barcode</label>
      <input type="number" class="form-control" id="product_barcode" placeholder="product_barcode" required autocomplete="off" name="product_barcode">
    </div>
    <input type="hidden" name="functionality" value="product_modify">
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
