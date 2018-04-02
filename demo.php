<?php
ini_set('display_error',1);
error_reporting(E_ALL);

const BASE_API_URL="http://members.lasvegasrealtor.com/search/v1/realtors?";
try{

 processURL();

	}
	catch{
		$error=array('text' => $e->getMessage());
		$parent=array();
		array_push($parent,$error);
		$obj->messages =$parent;
		echo json_encode($obj);

	}	
	function processURL()
	{
		$action= $_GET['action'];
		if(isset($_GET['first_name']))
		{

			$first_name=$_GET['first_name'];

		}
		if(isset($_GET['last_name']))
		{
			$last_name=$_GET['last_name'];

		}
		if(isset($_GET['office_name']))
		{
			$office_name=$_GET['office_name'];

		}
		$myurl=" ";
		if($action==='search')
		{
			if(isset($first_name) && isset($last_name) && isset($office_name))
			{
				$myurl="first_name=".$first_name.""."&"."
				last_name=".$last_name.""."&"."office_name=".$office_name."";
			}
			else{
				{
				if(isset($first_name))
				{
					$my_url .="first_name".$first_name;
				}
				if(isset($last_name))
				{
					$myurl .= "last_name=".$last_name;
				}
				if(isset($office_name))
				{
					$myurl="office_name=".$office_name;
					}
				}
			}
				if(!isset($first_name) && !isset($last_name) && !isset($office_name) && !strlen($first_name) && !strlen(last_name) && !strlen($office_name)){
				throw new Exception("Error Processing Request. No search query given ",1);
		}
			doRequest($my_url);
		}

		else{
				if(!strlen($action)){
					throw new Exception("No action defined",1);
				}
				else{
							throw new Exception("Invalid action specified",1);
						}	

			}
	}

	function doRequest($my_url = null)
	{
		if(isset($my_url)) && strlen($my_url)
		{
			$curl =curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER =>1,
				CURLOPT_URL =>BASE_API_URL.$my_url,
				CURLOPT_USERAGENT => 'Requesting to las vegas relator search....'	
				));
			$resp=curl_exec($curl);
			processOutput($resp);
			curl_close($curl);
		}
		else{
			throw new Exception("No URL has been passed to make a request",1);
		}

	}
	function processOutput($resp=null)
	{
		if(count($resp))
		{
			$elements =array();
			$elements_btn_array =array();
			$messages =array();
			$attachment_arr=array();
			$counter =0 ;
			if(isset($_GET['start'])){

				$paginate_start=$_GET['start'];

			}
			else{
				$paginate_start =0 ;
			}
			if(isset($_GET['end'])){
				$paginate_end=$_GET['end']
			}
			else{
				$paginate_end=2;
			}
			if(gettype($resp_arr) === 'object')
			{
				$msg=array('text' =>"No Search Results!");
				$parent=array();
				array_push($parent,$msg);
				$obj = new stdClass();
				$obj->messages =$parent;
				$variables_obj = new stdClass();
				$variables_obj = 404;
				$obj->set_variables=variables_obj;
				print_r(json_encode($obj));
			}
			else{
				if(count($resp_arr)){
					$counter = count($resp_arr);
					if(array_key_exists($paginate_start,$resp_arr) && array_key_exists($paginate_end, $resp_arr)){
						for($i=$paginate_start ; $i < $paginate_end ; $i++){

							$btn_obj = new stdClass();
							$btn_obj->type="phone number";
							$btn_obj->url= $resp_arr[$i]->office_phone_number;
							$btn_obj->title="call";
							$elements_btn_array[0]=$btn_obj;

							$elem_objects= new stdClass();
							$elem_objects->title = $resp_arr[$i]->full_name;
							$elem_objects->image_url="http://159.203.81.237/test/GLVAR_transparent-logo.jpg";
							$elem_objects->subtitle =$resp_arr[$i]->office_name;
							$elem_objects->buttons = $elements_btn_array;
							array_push($elements,$elem_objects);

							$payload =new stdClass();
							$payload->template_type="list";
							$payload->top_element_style="large";
							$payload->elements=$element;

							$attachment=new stdClass();
							$attachment->type="template";
							$attachment->payload=$payload;
							$list_view =new stdClass();
							$list_view->messages[]=['attachment' => $attachment];
						} 
						//when the counter is more than 2 we have to do pagination 
						if($counter>2){
							//$variables_obj = new stdClass();
							$variables_obj1 = new stdClass();
							$variables_obj1->demo =200;
							$variables_obj1->page_strt = $paginate_start+2;
							$variables_obj1->page_end = $paginate_end+2;
							$list_view->set_attributes =$variables_obj1;
						}
						else{
							$variable_obj = new stdClass();
							$variables_obj->demo =404;
							$list_view->set_attributes=$variables_obj;
						}
						print_r(json_encode($list_view));
					}else{
						$msg=array('text' => "No More Results! ");
						$parent=array();
						array_push($parent,$msg);
						$obj = new stdClass();
						$obj->messages= $parent;
						$variable_obj = new stdClass();
						$variable_obj->demo=404;
						$obj->set_attributes=$variable_obj;
						print_r(json_encode($obj));
					}

				}else {
						$msg=array('text' => "No More Results!");
						$parent =array();
						array_push($parent,$msg);
						$obj = new stdClass();
						$obj->messages=$parent;
						$variable_obj=new stdClass();
						$variable_obj->demo =404;
						$obj->set_attributes=$variable_obj;
						print_r(json_encode($obj));
						}
			}
		}else{
			$msg=array('text' => "No Search Results!");
			$parent =array();
			array_push($parent,$msg);
			$obj =new stdClass();
			$obj->message=$parent;
			$variable_obj =new stdClass();
			$variable_obj->demo =404;
			obj->set_attributes=$variable_obj;
			print_r(json_encode($obj));
		}





			}



		}
	}
						


?>
