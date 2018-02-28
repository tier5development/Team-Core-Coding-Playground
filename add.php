<!DOCTYPE html>
<html>
<head>
	<title>Add two number and displaying in third text field</title>
</head>
<body>
<form name=form1 method="POST" action="">
Num1: <input type="text" id ="x" name="a"  value="">
Num2: <input type="text" id = "y" name="b" value="">
Result: <input type="text" id="v" name="c" value=""> 
<input type="button" name="Result"  value="Add" onclick="add()">
</form>




<script type="text/javascript">	

function add()
{

var p = parseInt(document.getElementById("x").value);
var q = parseInt(document.getElementById("y").value);

var Result = p + q;
 
document.getElementById("v").value = Result;
}
echo $_SERVER['SERVER_ADDR'];
</script>

some changes have been made in a file . And this is a  second time .

</body>
</html>
