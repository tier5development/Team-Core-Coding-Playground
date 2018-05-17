$(document).ready(function(){
	$("#log").click(function(e){
		var email=$("#email").val();
		var password=$("#password").val();
		var user_id=$("#user_id").val();
		var functionality=$("#functionality").val();
		$.post("http://localhost/ekart/backend/functionality.php",
		 {
		 	email : email,
		 	password : password,
		 	user_id : user_id,
		 	functionality :functionality
		 }, 
		 function(data){
        if(data==0){
        	window.location.href = "http://localhost/ekart/frontend/dashboard.php";
        }
        else
        {
        	if(data==1){
        	alert("you have to register first .... ");
        	window.location.href = "http://localhost/ekart/frontend/user_registration.php";
        }
        }
    });
	});
});