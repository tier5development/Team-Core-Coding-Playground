<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<?php
session_start();
echo "<h1> Hello ".$_SESSION['name'].$_SESSION['id']." </h1>";
?>
<a href="Welcome.php">Logout</a>
</body>
</html>
