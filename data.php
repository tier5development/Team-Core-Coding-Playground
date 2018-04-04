<?php 
require_once(__DIR__.'/iniseterror.php');
require_once(__DIR__.'/database/database_connection.php');

/*try{*/

$sql="SELECT DISTINCT email FROM tbl_registration ";
$statement=$db->prepare($sql);
$statement->execute();
$arr=$statement->fetchAll();

echo "i am here";
exit();
//$result=$statement->setFetchMode(PDO :: FETCH_ASSOC);

    /*foreach ($arr as $key => $value) {
    	 echo "<pre>";
  	 $arr1=array($value['email']);
  		print_r($value['email']);
  		$arr1=array($value['email']);
  		foreach($arr1 as $name){
  			print_r($name);
  		} 	
    	 } */




    	 	 $q=$_REQUEST["q"];
    	    $hint="";
    	    if($q !== ""){
    	    	$q=strtolower($q);
    	    	$len=strlen($q);
    	    	foreach ($arr as $key => $value) {
    	    	$arr1=array($value['email']);
    	    	foreach ($arr1 as $name) {
    	    		if(stristr($q, substr($name , 0 , $len))){
    	    			if($hint === ""){
    	    				$hint=$name;
    	    			}
    	    			else{
    	    				$hint .=",$name";
    	    			}
    	    		}
    	    	}
    	    }
    	    }
    	    echo $hint==="" ? "no suggestion" : $hint;








/*}
catch(PDOException $e){
	echo "error".$e->getMessage();
}
*/




?>
