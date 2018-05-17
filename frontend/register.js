$(document).ready(function(){
	$("#reg").click(function(e){
		var name = $("#name").val();
		var email = $("#email").val();
		var password = $("#password").val(); 
		var functionality = $("#functionality").val();     
    //var data = "name=" + name + "&email="+ email +"&password=" + password + "&functionality=" + functionality ; 
		$.post("http://localhost/ekart/backend/functionality.php", 
			{
				name: name,
				email:email,
				password:password,
				functionality:functionality,
			}, function(data){
        if(data==0){
        window.location.href = "http://localhost/ekart/frontend/user_login.php";
      }
    });
	});
});

