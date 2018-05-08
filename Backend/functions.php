<?php
session_start();
require_once (__DIR__."/conn.php");
require_once (__DIR__."/iniseterror.php");
$functions=$_POST["func"];
switch ($functions){
    case 'reg':
        signup($conn);
        break;
    case 'signin':
        signin($conn);
        break;
    default :
        $_SESSION['message2'] = 'no functions selected';
        break;
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
        $sql="SELECT * FROM `registration` WHERE `Email` LIKE '".$email."'";
        $statement= $conn->prepare($sql);
        $result=$statement->execute();
        $count=$statement->fetch();
        if($count == 0) {
            if ($pass === $conpass) {
                if (strlen($conpass) >= 8) {
                    $query = "INSERT INTO `registration` 
                        (`First Name`, `Last Name`, `Email`, `Password`, `Age`, `Gender`) VALUES ('" . $fname . "', '" . $lname . "', 
                        '" . $email . "', MD5('" . $conpass . "'), '" . $age . "', '" . $gen . "')";
                    $res = $conn->query($query);
                    if ($res) {
                        $_SESSION['id'] = $email;
                        $_SESSION['name'] = $fname . " " . $lname;
                        $_SESSION['message1']="success";
                        header('Location: ../frontend/dashboard.php');
                    } else {
                        echo 'session creation failed';
                    }
                } else {
                    $_SESSION['message']="the password should be more than 8 charecters ";
                    header('Location: ../frontend/Welcome.php');
                }

            } else {
                $_SESSION['message']="Both password should match";
                header('Location: ../frontend/Welcome.php');
            }
        }
        else{
            $_SESSION['message']="you already have an account, please log-in";
            header('Location: ../frontend/login.php');

        }
    }
    else{
        $_SESSION['message']="all fields should be filled ";
        header('Location: ../frontend/Welcome.php');
    }
}

/**
 * this is a sign in function that first checks the email then password and act accordingly
 * @param $conn
 */
function signin($conn){
    $email=$_POST['email1'];
    $pass=$_POST['pass1'];
    $mdpass=md5($pass);
    //checking email-ids
    $sql="SELECT * FROM `registration` WHERE `Email` LIKE '".$email."'";
    $statement= $conn->prepare($sql);
    $result=$statement->execute();
    $count_mail=$statement->fetch();
    if($count_mail !=0){
        //checking password is present or not
        echo $sql2="SELECT * FROM `registration` WHERE `Password` ='".$mdpass."'";
        $statement2= $conn->prepare($sql2);
        $result2=$statement2->execute();
        $count_pass=$statement2->fetch();
        print_r($count_pass);
        /*if ($count_pass != 0){
            echo"done";
            $_SESSION['id'] = $email;
            $_SESSION['message1']="success";
            header('Location: ../frontend/dashboard.php');
        }
        else{
            echo "prob1";
            $_SESSION['message']="Your password is incorrect";
            header('Location: ../frontend/login.php');
        }*/
    }
    else{
        echo "prob2";
        $_SESSION['message']="You are not registerd with us ";
        header('Location: ../frontend/login.php');
    }

}

?>