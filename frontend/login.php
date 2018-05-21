<?php
session_start();
if(!isset($_SESSION['id'])){ ?>

<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>
        Login
    </title>
    <link rel="stylesheet" href="../css/styles.css">

<body>
<?php
session_start();
echo "<h4>".$_SESSION['message']."</h4>";
$_SESSION['message']="";
?>
<a class="button2" href="Welcome.php">Sign Up From here</a>
<form method="post" action="../Backend/functions.php" class="container">
    <table>
        <tr>
            <td>
                Email id :
            </td>
            <td>
                <input type="email" name="email1" id="email"><br>
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
                <input type="password" name="pass1"><br>
            </td>
        </tr>

    </table>
    <table>
        <tr>
            <td>
                <button class="button1" name="signin" type="submit">Signin</button>
            </td>
        </tr>
    </table>
    <input type="hidden" name="func" value="signin">
</form>
</body>
</html>
<?php

}else{
    header('Location: ../frontend/dashboard.php');
}
?>