$(document).ready(function(){
	$("#reg").click(function(){
		var name = $("#name").val();
		var email = $("#email").val();
		var password = $("#password").val(); 
		var functionality = $("#functionality").val();
     
    var data = "name=" + name + "&email="+ email +"&password=" + password + "&functionality=" + functionality ;  
		$.ajax({
 	methods : "post",
			url : "../backend/functionality.php",
			data: data,
			/*data : $('#form2').serialize() + "&name=name&email=email&password=password"*/
			success : 	function()
			{
				/*$("#reg_output").html(data);*/
			}
		});
	});
});

