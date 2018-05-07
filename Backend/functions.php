<?php
require_once (__DIR__."/conn.php");
require_once (__DIR__."/iniseterror.php");
$functions=$_POST["func"];
if(isset($functions) == "reg"){
    signup($conn);
}
else{
    signin($conn);
}


/**
 * this is the Signup function.
 * @param $conn
 */
function signup($conn){
    $fname=$_POST["first_name"];
    $lname=$_POST["last_name"];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $conpass=$_POST['conpass'];
    $gen=$_POST['gender'];
    $age=$_POST['age'];
    if ($fname && $lname && $email && $pass && $conpass && $gen && $age){
        if($pass === $conpass) {
            if(strlen($conpass) >= 8){
                $query = "INSERT INTO `registration` 
                    (`First Name`, `Last Name`, `Email`, `Password`, `Age`, `Gender`) VALUES ('" . $fname . "', '" . $lname . "', 
                    '" . $email . "', MD5('" . $conpass . "'), '" . $age . "', '" . $gen . "')";
                $conn->query($query);
                echo "Success";
            }
            else{
                echo "the password should be more than 8 charecters ";
            }

        }
        else {
            echo "Password is not matching";
        }
    }
    else{
        echo " all fields should be filled";
    }

}


?>