<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
    	try
    	{
    	$rules = array(
    			'name'		=>'required',
    			'user_name'	=>'required|unique:users|max:10',
    			'email'		=>'required|unique:users',
    			'password'	=>'required|min:8',
    			'password'	=>'required_with:password|same:password|min:8'

    		);
    		 $this->validate( $request , $rules);

    		$user = new User();
    		$user->name = $request->name;
    		$user->user_name = $request->user_name;
    		$user->email = $request->email;
    		$user->password = $request->password;
    		$user->save();

    		return redirect()->route('project.log_in')->with(['success' => true, 'message'=>'Registered Successfully.. Now Login!!!!']);
    	}
	    catch (Exception $exception)
        {
            return $exception;
        }

    }
}
