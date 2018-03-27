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

  	$username = $req->input('username');
  	$password = $req->input('password');

  	 echo $username."--->".$password;
  	

  }


}
