<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Dirape\Token\Token;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Reset;

class loginController extends Controller
{

  public function index($token) {

    try

      {

      return view('auth.resetPassword',[
        'token' => $token 
      ]);
       } catch (Exception $exception) {
      return view('project.home')->with(['success' => false, 'message' => $exception->getMessage()]); 
    }
  }








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

   // $user = User::where('email',$email)->where('password',$password)->first();
  	  $user = DB::table('users')->where(['email'=>$email,'password'=>$password])->get();
  	 if($user)
  	 {
  	 		echo "Welcome ". $email;

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



$validateData=$request->validate([
                'email' => 'required'
            ]);


     
$reset = new Reset;

       $reset->email = Input::get('email');
       $token_key = md5(uniqid(rand(), true));
       $reset->token = $token_key;
       $reset->save();
       return Redirect::back();
}



}
