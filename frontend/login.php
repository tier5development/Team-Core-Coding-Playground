<html>
<head>
    <title>
        Login
    </title>
</head>
<body>
<?php
session_start();
echo "<h4>".$_SESSION['message']."</h4>";
$_SESSION['message']="";
?>
<form method="post" action="../Backend/functions.php">
    Email id : <input type="email" name="email1" id="email"><br>
    Password: <input type="password" name="pass1"><br>
    <input type="hidden" name="func" value="signin">
    <button name="signin" type="submit">Signin</button>
</form>
</body>
</html>