<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Dirape\Token\Token;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
use Mail;
use App\User;
use App\Reset;
use Illuminate\Support\Facades\Input;
use Validator;


class loginController extends Controller
{


  public function index() {
    try{
      $token = (Input::has('token')) ? Input::get('token') : null;
      $user_id = (Input::has('user_id')) ? Input::get('user_id') : null;
      return view('auth.resetPassword',[
        'token' => $token,
        'user_id' => $user_id 
      ]);
    } catch (Exception $exception) {
      return view('project.home')->with(['success' => false, 'message' => $exception->getMessage()]); 
    }
  }




    //Logout Function
        public function logout() {
            Auth::logout();
            return redirect()->route('project.home');
            //return view('user.logout');
        }





//this function is just for creating token  and sending mail
 public function save_data(Request $request){
         $validateData=$request->validate([
                'email' => 'required']);
       
         $user = User::whereEmail($request->email)->first();
          if(!$user){
            dd('User not exist. Go back and try again');
          }
         
          else{
           
            $token = str_random(64); 
            $reset = new Reset();
            $reset->email = $request->email;
            $reset->token = $token;
            $reset->save();        
          }
          
          Mail::send('auth.resetMail',['email' => $user->email,'token' => $reset->token,'user_id' => base64_encode($user->id)],
            function($message) use($request) {
            $message->from('work@tier5.us','Work');
            $message->to($request->email)->subject('Reset your password');
          });
       
    }


//this function is just for creating new password
    public function resetPassword(Request $request){
        try{
            $validateData=$request->validate([
              'password' => 'required|min:8',
              'password1' => 'required_with:password1|same:password1|min:8'
            ]);
            $user = User::find(base64_decode($request->user_id));
           
            if($user)
             {  
              $user->password = bcrypt($request->password1);
              $user->update();  
              Reset::where('token', $request->token)->delete();
              return view('auth.login');
           }
            else
             {
              if(!$texists){
                dd("Invalid token or token got expired");
              }
              else if(!$Eexists){
                dd("Invalid email id. Please go back and try again later"); 
              }
           }
       }
      catch (Exception $exception) {
      return view('project.home')->with(['success' => false, 'message' => "Invalid Request"]); 
    }
        
  }


//function just for creating login page
  public function login(Request $request)
  {

  	 $validateData=$request->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password
        ];
      

  	 if(Auth::attempt($credentials))
  	 {
  	 	 return redirect()->route('project.home')->with(['success' => true,'message' => 'You are logged in  successfully']);

  	 }
  	 else
  	 {
  	 		return redirect()->route('project.home')->with(['success' => true,'message' => 'Invalid user']);
  	 }
  	

  }



  public function reset()
  {
    return view('auth.resetPassword');
  }




public function forgot()
{
return view('auth.forgot');
}










}
