<?php
session_start();
if((isset($_SESSION["page_id"])))
{
?>
<html>
<body>
<title>Admin</title>
<h3>Welcome_To_Admin</h3>
<div>
<div>
<span>
<input type="button" value="Add Shop" onclick="window.location.href= 'http://<?php echo $_SERVER['SERVER_NAME']; ?>/ekart/frontend/shop.php'"/>	
</span>
<span>
<input type="button" value="Add Product" onclick="window.location.href='http://<?php echo $_SERVER['SERVER_NAME']; ?>/ekart/frontend/product.php'"/>
</span>
<span>
<input type="button" value="Logout" onclick="window.location.href='http://<?php echo $_SERVER['SERVER_NAME']; ?>/ekart/frontend/logout.php?name=logout_admin'" />
</span>
</div>
</div>
</body>
</html>
<?php //session_unset($_SESSION["page_id"]); ?>
<?php } else { ?>
<?php header('location:../frontend/admin_login.php');  }?>	
		