<?php
session_start();
if(!isset($_SESSION['id'])){ ?>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<h1>welcome</h1>

<form method="post" action="../Backend/functions.php" class="container">
    <table>
        <tr>
            <td>
                <h4><?php session_start();
                    echo $_SESSION['message'];
                    $_SESSION['message']="";?></h4>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                First Name:
            </td>
            <td>
                &nbsp<input type="text" name="first_name" ><br>
            </td>
        </tr>
        <tr>
            <td>
                Last Name :
            </td>
            <td>
                &nbsp<input type="text" name="last_name"><br>
            </td>
        </tr>
        <tr>
            <td>
                Email id :
            </td>
            <td>
                &nbsp<input type="email" name="email" id="email"><br>
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
                &nbsp<input type="password" name="pass"><br>
            </td>
        </tr>
        <tr>
            <td>
                Confirm Password:
            </td>
            <td>
                &nbsp<input type="password" name="conpass"><br>
            </td>
        </tr>
        <tr>
            <td>
                Age :
            </td>
            <td>
                &nbsp<input type="text" name="age"><br>
            </td>
        </tr>
        <tr align="center">
            <td>
                &nbsp <input type="radio" name="gender" value="male">Male<br>
            </td>
            <td>
                <input type="radio" name="gender" value="female">Female<br>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                &nbsp <button type="submit" name="submit" class="button1">Sign Up </button>
            </td>
        </tr>
    </table>
    <input type="hidden" name="func" value="reg">
</form>
</body>

</html>
<?php
}else{
    header('Location: ../frontend/dashboard.php');
}
?>
