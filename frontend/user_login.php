<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="login.js"></script>
</head>
<body>
<div class="container">
  <h2>USER LOGIN</h2>
  <form id="form2">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" placeholder="email" required autocomplete="off" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="password" required autocomplete="off" name="password">
    </div>
    <input type="hidden" name="user_id" id="user_id" value="login">
    <input type="hidden" name="functionality" id="functionality" value="user_login">
    <input type="button" id="log" value="Submit">
  </form>
</div>
</body>
</html>

