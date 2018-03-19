<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script>
      // Code copied from Facebook to load and initialise Messenger extensions
      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.com/en_US/messenger.Extensions.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'Messenger'));
    </script>



<form method="POST" action="webview.php"> 

Take the string :<input type="text" name="input_string">
<input type="submit">

<input type = "text" 
</form>

</body>
</html>

<?php



	if(isset($_POST["input_string"]))
	{
		$x = $_POST["input_string"];
        echo strlen($x);

	}


?>

