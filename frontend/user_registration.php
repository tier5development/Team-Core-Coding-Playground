<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- <script src="../js/jquery.js"></script> -->
  <script src="register.js"></script>
</head>
<body>

<div class="container">
  <h2>USER REGISTRATION</h2>
  <?php //echo $_SERVER['SERVER_NAME']; ?>
  <form id="form2" >
  <!-- <div id="reg_output"></div> -->
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="name" required autocomplete="off" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" placeholder="email" required autocomplete="off" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="password"  required autocomplete="off" name="password">
    </div>
    <input type="hidden" name="functionality" id="functionality" value="user_registration">
    <input type="button" id="reg" value="Submit">
  </form>
</div>
</body>
</html>

