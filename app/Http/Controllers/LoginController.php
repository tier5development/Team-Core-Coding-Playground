<?php

namespace App\Http\Controllers;


use Redirect;
use Illuminate\Http\Request;
use Auth;
use App\User; 
use Input;

class LoginController extends Controller
{
     

    public function doLogin(Request $request){
    	$validateData=$request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

    	$credentials = [
    		'email'		=> $request->email,
    		'password'	=> $request->password
    	];

   		if(Auth::attempt($credentials)) {
   			dd("Logged in successfully");
		}	else {
			dd("Something went wrong");
			
		}
   	}

    		

}
