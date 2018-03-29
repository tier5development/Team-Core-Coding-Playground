<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\passwordReset;
use Mail;

class resetPasswordController extends Controller
{
    
	
	 //Check id is exist or not
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
            $token = str_random(20); 

            $reset = new passwordReset();
            $reset->email = $request->email;
            $reset->token = $token;
            $reset->save();        

          }

          Mail::send('resetmail',['name' => 'Durgesh','request' => $request],function($message) use($request){
          	$message->to($request->email)->subject('Reset your password');
          	$message->from('work@tier5.us','Work');
          });

          //return view('user.forgotpasswordcreator');

    }

	/*public function resetPasswordV(){

	     Mail::send(['text'=>'mail'],['name' => 'Durgesh'], function($message){
	                $message->to('$request->email','Name')->subject('Testing');
	                $message->from('work@tier5.us','Work');
	            });
 	}*/

 	public function newPassword (Request $request){

         $validateData=$request->validate([
            'email'     => 'required',
            'token'     => 'required',
            'password1' => 'required|min:8',
            'password2' => 'required_with:password1|same:password1|min:8'
        ]);
        
        $texists=passwordReset::where('token', '=', $request->token)->exists();
        $Eexists=passwordReset::where('email', '=', $request->email)->exists();
        
        if(($texists)&&($Eexists))
        {
        	User::where ('email', $request->email)->update(['password' => bcrypt($request->password1)]);
        	return view('user.login');
    	    }
        else
        {
        	if(!$texists){
        			dd("Invalid token. Please go back and try again later");
        		}
        	else if(!$Eexists){
        			dd("Invalid email id. Please go back and try again later");	
        	 	}
 	     }
        

    }



}