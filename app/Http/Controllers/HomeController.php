<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
    	$data = [ 'first_name' => "Swami", 'last_name' => "Shekhar"];
    	return view('hello.index',$data);
    }


    public function create()
    {
    	return view('hello.create_msg');
    }

public function index()
    {
    	return view('hello.index');
    }


    public function formsubmit(Request $request)
    {
    	$username = $request->username;
    	$email = $request->email;
    	$data = ['username'=>$username, 'email'=>$email];

    	return view('form-value',compact('data'));
    }
   
}
