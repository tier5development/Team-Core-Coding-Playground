<?php
		if(isset($_POST["action"]))
$action=$_POST["action"];

elseif (isset($_GET["action"])) {
	$action=$_GET["action"];
}

switch ($action) {
	case 'bot':
		$data=$_POST;
 		
 		$name=$_POST['name'];
 		$email=$_POST['email'];
 		$website=$_POST['website'];
 		$comment=$_POST['comment'];
 		$gender=$_POST['gender'];


 					 $btn_obj = new stdClass();
					 $btn_obj->type="text";
		       $btn_obj="EmpName=".$name.","."Email=".$email.","."Website=".$website.","."comment=".$comment.","."Gender=".$gender;
		       $list_view= new stdClass();
					 $list_view->messages[] = ['text' => $btn_obj];

					 echo json_encode($list_view);

 	
 }else {
		   return 0;
		}
		break;
 		
 	?>
