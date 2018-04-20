<?php
require_once(__DIR__.'/../database/conn.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$sql="SELECT * FROM product";
$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
   echo "<table>";
    while($row = mysqli_fetch_assoc($result)) {
    		
        echo "<tr><td>" . $row['barcode'] . "</td><td>" . $row['name'] . "</td><td>" . $row['price'] . "</td><td>" . $row['brand'] . "</td></tr>";
        /*echo $row['barcode'] . " " . $row['name'];*/
         
    }
    echo "</table>";
}
?>