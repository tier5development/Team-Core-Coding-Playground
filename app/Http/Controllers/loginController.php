<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use App\Reset;

class loginController extends Controller
{

  public function login(Request $req)
  {

  	$email = $req->input('email');
  	$password = $req->input('password');

  	$validator = Validator::make($req->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
    }

    $user = User::where('email',$email)->where('password',$password)->first();
  	 // $check = DB::table('users')->where(['email'=>$email,'password'=>$password])->get();
  	 if($user)
  	 {
  	 		echo "Sucessfully logged in";
  	 }
  	 else
  	 {
  	 		echo "Not logged in";
  	 }
  	

  }


public function forgot(Request $req)
{
	return view('auth.forgot');

}

public function save_data(Request $request)
{     
$test = Reset::create($request->all());
return redirect()->route('/');
}





}
