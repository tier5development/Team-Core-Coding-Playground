<?php
require_once (__DIR__."/iniseterror.php");
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "root");
define("DBNAME", "php");
$conn = new mysqli(HOSTNAME,USERNAME,PASSWORD,DBNAME);
if($conn -> connect_error){
    die("Connection lost".$conn->connect_error);
}
else{
    echo "Connection successful";
}
?>