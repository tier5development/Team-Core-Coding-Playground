<body>
<p id="demo"></p>
<button id="btn1">click</button>
<script type="text/javascript">
	document.getElementById("btn1").addEventListener("click", myfunction);
	function myfunction() {
    document.getElementById("demo").innerHTML = ex();
}

function ex()
{
	var x="<?php display(); ?>";
	return x;
}

 <?php
class Name{
var $firstname;
var $lastname;
function Name($firstname ,$lastname)
	{
		$this->firstname=$firstname;
		$this->lastname=$lastname;
	}	

}
/**
* 
*/
class Fullname extends Name
{
	var $middlename;
	function Fullname($firstname,$middlename,$lastname)
	{
		Name::Name($firstname,$lastname);
		$this->middlename=$middlename;
		return ($firstname ."<br>".$middlename."<br>".$lastname);
	}
	/*function display1()
	{
		return  ("anirban");
	  
	  
	}
*/
}

function display(){
$obj1=new Fullname();
$obj=new Fullname();
/*
$obj1->Fullname("anirban","tiger","dhara");*/
	print_r($obj1->Fullname("anirban","tiger","dhara"));
	print_r("<br>");
	print_r($obj1->Fullname("sankar","tiger","dhara"));

}

?>
</script>
</body>