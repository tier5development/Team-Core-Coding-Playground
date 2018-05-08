<html>
<head>
    <title>Welcome</title>
</head>
<body>
<h1>welcome</h1>
<h4><?php session_start();
    echo $_SESSION['message'];
    $_SESSION['message']="";?></h4>
<form method="post" action="../Backend/functions.php">
    First Name: &nbsp <input type="text" name="first_name" ><br>
    Last Name : &nbsp <input type="text" name="last_name"><br>
    Email id : <input type="email" name="email" id="email"><br>
    Password: <input type="password" name="pass"><br>
    Confirm Password: <input type="password" name="conpass"><br>
    Age : &nbsp <input type="text" name="age"><br>
    <input type="radio" name="gender" value="male">Male<br>
    <input type="radio" name="gender" value="female">Female<br>
    <input type="hidden" name="func" value="reg">
    <button type="submit" name="submit">Sign Up </button>
</form>
</body>

</html>
