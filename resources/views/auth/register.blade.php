<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title></title>
</head>
<body>

<div class="container"><br>
<form action="/insert" onclick="validation()" class="bg-light" method="POST">

{{csrf_field()}}

<div class="form-group">
    <label>Username :</label>
    <input type="text" name="user" class="form-control" id="user">
    <span id="username" class="text-danger" font-weight-bold></span>
</div>


<div class="form-group">
    <label>Password :</label>
    <input type="password" name="pass" class="form-control" id="pass">
    <span id="password" class="text-danger" font-weight-bold></span>
</div>

<div class="form-group">
    <label>Confirm Password :</label>
    <input type="password" name="conpass" class="form-control" id="conpass">
    <span id="confirmpsw" class="text-danger" font-weight-bold></span>
</div>

<div class="form-group">
    <label>Mobile Number :</label>
    <input type="text" name="mobile" class="form-control" id="mobile">
    <span id="mobnum" class="text-danger" font-weight-bold></span>
</div>


<div class="form-group">
    <label>Email :</label>
    <input type="text" name="email" class="form-control" id="email">
    <span id="emailn" class="text-danger" font-weight-bold></span>
</div>
<input type="submit" name="submit" value="submit">
</form>

<script type="text/javascript">
    
function validation()
{
    var user = document.getElementById('user').value;
    var pass = document.getElementById('pass').value;
    var conpass = document.getElementById('conpass').value;
    var mobile = document.getElementById('mobile').value;
    var email = document.getElementById('mobile').value;



if(user == "")
            {
                document.getElementById('username').innerHTML = "** Please fill username field";
                return false;
            }


if(pass == "")
            {
                document.getElementById('password').innerHTML = "** Please fill password field";
                return false;
            }


if(conpass== "")
            {
                document.getElementById('confirmpsw').innerHTML = "** Please fill the confirm password field";
                return false;
            }


if(mobile== "")
            {
                document.getElementById('mobnum').innerHTML = "** Please fill mobile field";
                return false;
            }

if(email== "")
            {
                document.getElementById('emailn').innerHTML = "** Please fill the email field";
                return false;
            }

}


</script>




</body>
</html>