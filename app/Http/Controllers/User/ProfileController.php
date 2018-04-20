<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Posts;
use App\User;
use Auth;

class ProfileController extends Controller
{
    
	/*
	 * View user profile 
	 */
    public function viewProfile($user_email)
    {
	    try{
		    	$profile = User::where('email',$user_email) -> first();
		    	if($profile)
		    	{
		    		$posts = Posts::where('author',$user_email)->get();
		    		return view('users.userProfile',compact('profile','posts'));
		    	}
		    	else
		    	{
		    		return view('errors.404');
		    	}
		    }
		catch(Exception $exception)
		{
			return $exception;
		}
	}

	/*
	 * View current user profile
	 */
	 public function viewCurrentUser()
    {
	    try{
		    	$profile = User::where('email',Auth::user()->email) -> first();
		    	if($profile)
		    	{
		    		$posts = Posts::where('author',Auth::user()->email)->get();
		    		return view('users.userProfile',compact('profile','posts'));
		    	}
		    	else
		    	{
		    		return view('errors.404');
		    	}
		    }
		catch(Exception $exception)
		{
			return $exception;
		}
	}


	/*
	 * Search User controller
	 */
	public function searchUser(Request $request)
	{
		try
		{
			$value = User::where('firstName',$request->key)->first();
			if(!$value)
			{
				$value = User::where('lastName',$request->key)->get();
				return view('users.searchUserResult',compact('value','request'));
			}
			$value = User::where('firstName',$request->key)->get();
			return view('users.searchUserResult',compact('value','request'));			
		}
		catch(Exception $exception)
		{
			return $exception;
		}
	}
}
