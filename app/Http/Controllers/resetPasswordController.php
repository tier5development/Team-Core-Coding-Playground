<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\passwordReset;
use Mail;

class resetPasswordController extends Controller
{
    
	
	public function index($token) {
		try{

			return view('user.forgotpasswordcreator',[
				'token'	=> $token	
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

         $exists=User::where('email', '=', $request->email)->first();

          if(!$exists){
            dd('User not exist. Go back and try again');
          }
          //Sent mail to the user
          else{
          	//dd();
            //return view('user.forgotpasswordcreator');
            $token = str_random(30); 

            $reset = new passwordReset();
            $reset->email = $request->email;
            $reset->token = $token;
            $reset->save();        

          }

          //try{

	          Mail::send('resetmail',['request' => $request->email],function($message) use($request){
	          	$message->to($request->email)->subject('Reset your password');
	          	//$message->from('work@tier5.us','Work');
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
	            'email'     => 'required',
	            'password1' => 'required|min:8',
	            'password2' => 'required_with:password1|same:password1|min:8'
		        ]);
		        
		        $texists=passwordReset::where('token', '=', $request->token)->exists();
		        $Eexists=passwordReset::where('email', '=', $request->email)->exists();
		                
		        if(($texists)&&($Eexists))
		         {  	
		        	User::where ('email', $request->email)->update(['password' => bcrypt($request->password1)]);
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