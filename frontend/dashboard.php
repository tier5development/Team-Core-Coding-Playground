<?php if(isset($_SESSION['user_id'])) {?>
<html>
<body>
<h2>Welcome,</h2> <h1><?php echo $_SESSION['name'];?></h1>
<a href="'http://<?php echo $_SERVER['SERVER_NAME']; ?>/ekart/frontend/user_login.php'">logout</a>
</body>
</html>
<?php } else { ?>
<?php header('location:../frontend/user_login.php');  }?>