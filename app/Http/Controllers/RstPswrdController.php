<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\passwordReset;
use Mail;

class RstPswrdController extends Controller
{
    public function frgt(Request $request)
    {
    	$rules = array(
    			'email'	=>'required'
    		);
		$this->validate( $request , $rules);
    	$exists = User::where('email','=',$request->email)->exists();

    	if($exists){
    		$token = str_random(63);
    		$reset = new passwordReset();
    		$reset->email = $request->email;
    		$reset->token = $token;
    		$reset->save();

    		Mail::send('resetpasswordemail',['token' => $reset->token],function($message) use($request) {
    				$message->from('work@tier5.us','Hello');
    				$message->to($request->email)->subject('Reset Password');
    		});
    	}
    }

    public function reset_password_view($token) {

    	return view ('change_password',[
    		'token'	=> $token
    	]);

    }
}
