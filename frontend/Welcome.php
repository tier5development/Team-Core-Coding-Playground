<?php
/*session_start();
if(!isset($_SESSION['id'])){ */?>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>

</head>
<body>
<h1>welcome</h1>

<form method="post" action="../Backend/functions.php" class="container">
    <table>
        <tr>
            <td>
                First Name:
            </td>
            <td>
                &nbsp<input id="fname" type="text" name="first_name" ><br>
            </td>
            <td>
                <span style="color: red" id="fnameSpan"></span>
            </td>
        </tr>
        <tr>
            <td>
                Last Name :
            </td>
            <td>
                &nbsp<input id="lname" type="text" name="last_name"><br>
            </td>
            <td>
                <span style="color: red" id="lnameSpan"></span>
            </td>
        </tr>
        <tr>
            <td>
                Email id :
            </td>
            <td>
                &nbsp<input id="email" type="text" name="email" ><br>
            </td>
            <td>
                <span style="color: red" id="emailSpan"></span>
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
                &nbsp<input id="pass" type="password" name="pass"><br>
            </td>
            <td>
                <span style="color: red" id="passSpan"></span>
            </td>
        </tr>
        <tr>
            <td>
                Confirm Password:
            </td>
            <td>
                &nbsp<input id="conpass" type="password" name="conpass"><br>
            </td>
            <td>
                <span style="color: red"  id="conpassSpan"></span>
            </td>
        </tr>
        <tr>
            <td>
                Age :
            </td>
            <td>
                &nbsp<input id="age" type="text" name="age"><br>
            </td>
            <td>
                <span style="color: red"  id="ageSpan"></span>
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
<script type="text/javascript">
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    $(function () {
        $("#fname").focusout(function () {
           if ($.trim($("#fname").val()) == ''){
               $("#fnameSpan").html("This field should be filled");
               $("#fnameSpan").show();
           }
           else{
               $("#fnameSpan").hide();
           }
        });
        $("#lname").focusout(function () {
            if ($.trim($("#lname").val()) == ''){
                $("#lnameSpan").html("This field should be filled");
                $("#lnameSpan").show();
            }
            else{
                $("#lnameSpan").hide();
            }
        });
        $("#email").focusout(function () {
            if ($.trim($("#email").val()) != '') {
                if (!filter.test($("#email").val())) {
                    $("#emailSpan").html("not a valid email");
                    $("#emailSpan").show();
                }
                else {
                    $("#emailSpan").hide();
                }
            }
            else {
                $("#emailSpan").html("This field should be filled");
                $("#emailSpan").show();
            }
        });
        $("#pass").focusout(function () {
            if ($.trim($("#pass").val()) != '') {
                if ($.trim($("#pass").val().length <= 8)) {
                    $("#passSpan").html("not a valid email");
                    $("#passSpan").show();
                }
                else {
                    $("#passSpan").hide();
                }
            }
            else {
                $("#passSpan").html("This field should be filled");
                $("#passSpan").show();
            }
        });
        $("#conpass").focusout(function () {
            if ($.trim($("#conpass").val()) != '') {
                if ($.trim($("#conpass").val().length >= 8) && $("#pass").val() === $("#conpass").val()){
                    $("#conpassSpan").html("Password Matched");
                    $("#conpassSpan").show();
                }
                else {
                    $("#conpassSpan").html("Password didn't matched");
                    $("#conpassSpan").show();
                }
            }
            else {
                $("#conpassSpan").html("This field should be filled");
                $("#conpassSpan").show();
            }
        });
        $("#age").focusout(function () {
            if ($.trim($("#age").val()) != ''){
                if ($.isNumeric($.trim($("#age").val()))) {
                    if ($.trim($("#age").val()) <= 10) {
                        $("#ageSpan").html("you are to young to be in the internet");
                        $("#ageSpan").show();
                    }
                    else if ($.trim($("#age").val()) >= 60) {
                        $("#ageSpan").html("You are too old to be on the internet.");
                        $("#ageSpan").show();
                    }
                    else {
                        $("#ageSpan").hide();
                    }
                }
                else {
                    $("#ageSpan").html("Age is a number you dumb.");
                    $("#ageSpan").show();
                }
            }

            else{
                $("#ageSpan").html("This field should be filled");
                $("#ageSpan").show();
            }
        });


    });
</script>
</body>
</html>
<?php
/*}else{
    header('Location: ../frontend/dashboard.php');
}
*/?>
