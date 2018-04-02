<?php
 /*$displayUrl = "https://webviews.tier5-development.us/team_core/show_webview.php";*/

if($_SERVER["REQUEST_METHOD"] === "POST")
{
	$name = $_POST["name"];
	$email = $_POST["email"];
	$gender = $_POST["gender"];
	$website = $_POST["website"];
	$comment = $_POST["comment"];
	$gender =$_POST["gender"];

	 /*$btn_obj = new stdClass();
					 $btn_obj->type="text";
		       $btn_obj="EmpName=".$name.","."Email=".$email.","."Website=".$website.","."comment=".$comment.","."Gender=".$gender;
		       $list_view= new stdClass();
					 $list_view->messages[] = ['text' => $btn_obj];

					 echo json_encode($list_view);*/


					 $form_url= "https://api.chatfuel.com/5a55c29ae4b0d02fb2e7008b/users/157373241575468/messages?chatfuel_token=vnbqX6cpvXUXFcOKr5RHJ7psSpHDRzO1hXBY8dkvn50ZkZyWML3YdtoCnKH7FSjC&chatfuel_block_id=5aa90e3de4b02de32293197d&<name>=<$name>&<email>=<$email>&<website>=<$website>&<comment>=<$comment>&<gender>=<$gender>";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $form_url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);




}
  

 /*switch($action)
 {
 	$action=$_POST;
 	case 'variable':
 		# code...
 		break;*/


 }



	echo '{
	"messages": [
		{
			"attachment": {
				"type": "template",
				"payload": {
					"template_type": "generic",
					"image_aspect_ratio": "square",
					"elements": [
						{
							"title": "Hello World",
							"subtitle": "Choose your preferences",
							"buttons": [
								{
									"type": "web_url",
									"url": "https://webviews.tier5-development.us/anirban_webview/",
									"title": "Webview (compact)",
									"messenger_extensions": true,
									"webview_height_ratio": "compact"
								},
								{
									"type": "web_url",
									"url": "https://webviews.tier5-development.us/anirban_webview/",
									"title": "Webview (tall)",
									"messenger_extensions": true,
									"webview_height_ratio": "tall"
								},
								{
									"type": "web_url",
									"url": "https://webviews.tier5-development.us/anirban_webview/",
									"title": "Webview (full)",
									"messenger_extensions": true,
									"webview_height_ratio": "full"
								}
							]
						}
					]
				}
			}
		}
	]
}';
?>