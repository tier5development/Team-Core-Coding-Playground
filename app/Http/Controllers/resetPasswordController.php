<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\passwordReset;
use Mail;
use Illuminate\Support\Facades\Input;

class resetPasswordController extends Controller
{
    
	
	public function index() {
		try{

			$token = (Input::has('token')) ? Input::get('token') : null;
			$user_id = (Input::has('user_id')) ? Input::get('user_id') : null;
			return view('user.forgotpasswordcreator',[
				'token'	=> $token,
				'user_id'	=> $user_id	
			]);

		} catch (Exception $exception) {

			return view('project.home')->with(['success' => false, 'message' => $exception->getMessage()]); 
		}
	}
    public function forgetPassword(Request $request){
         $validateData=$request->validate([
                'email' => 'required'
            ]);

          //$exists = DB::table('users')->where('email', $request->email)->exists();

         //$exists=User::where('email', '=', $request->email)->exists();
         $user = User::whereEmail($request->email)->first();

          if(!$user){
            dd('User not exist. Go back and try again');
          }
          //Sent mail to the user
          else{
          	//dd();
            //return view('user.forgotpasswordcreator');
            $token = str_random(64); 

            $reset = new passwordReset();
            $reset->email = $request->email;
            $reset->token = $token;
            $reset->save();        

          }

          //try{

          Mail::send('resetmail',['email' => $user->email,'token' => $reset->token,'user_id' => base64_encode($user->id)],
          	function($message) use($request) {
          	$message->from('work@tier5.us','Work');
          	$message->to($request->email)->subject('Reset your password');
          });

      		/*}catch(Exception $exception) {

      			return view('user.forgotPassword')->with(['success' => false, 'message' => $exception->getMessage()]);
      		}*/

          //return view('user.forgotpasswordcreator');

    }

	/*public function resetPasswordV(){

	     Mail::send(['text'=>'mail'],['name' => 'Durgesh'], function($message){
	                $message->to('$request->email','Name')->subject('Testing');
	                $message->from('work@tier5.us','Work');
	            });
 	}*/

 	public function newPassword (Request $request){

        try{
 		        $validateData=$request->validate([
	            'password1' => 'required|min:8',
	            'password2' => 'required_with:password1|same:password1|min:8'
		        ]);

		        $user = User::find(base64_decode($request->user_id));
		        
		        //$texists=passwordReset::where('token', '=', $request->token)->exists();
		        //$Eexists=passwordReset::where('email', '=', $request->email)->exists();
 		       // $texists=passwordReset::whereToken($request->token);
 		       // $Eexists=passwordReset::whereEmail($request->email);

		        if($user)
		         {  
		         	$user->password = $request->password1;
		         	$user->update();	
		        	passwordReset::where('token', $request->token)->delete();
		        	return view('user.login');
		    	 }
		        else
		         {
		        	if(!$texists){
	        			dd("Invalid token or token got expired");
	        		}
		        	else if(!$Eexists){
	        			dd("Invalid email id. Please go back and try again later");	
	        	 	}
		 	     }
	 	   }


	    catch (Exception $exception) {

			return view('project.home')->with(['success' => false, 'message' => "Invalid Request"]); 
		}
        

    }



}