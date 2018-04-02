<?php
declare(strict_types = 1);
function returnIntValue(int value) : int {
	return $value ;
}
echo returnIntValue(5);

$username =$_GET['username'] ?? 'not passed';
echo $username ;
$username1 =isset($_GET['username']) ? $_GET['username'] : 'not passed';
echo $username1;
define(anirban,['home','family','happiness']);
$x=count(anirban);
for($i = 0 ; $i<=$x ; $i++ )
{
echo anirban[$i];
}
?>