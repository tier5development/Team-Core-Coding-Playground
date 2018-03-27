<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class loginController extends Controller
{

  public function login(Request $req)
  {

  	$email = $req->input('email');
  	$password = $req->input('password');

  	 $check = DB::table('users')->where(['email'=>$email,'password'=>$password])->get();
  	 if(count($check) >0)
  	 {
  	 		echo "Sucessfully logged in";
  	 }
  	 else
  	 {
  	 		echo "Not logged in";
  	 }
  	

  }


}
