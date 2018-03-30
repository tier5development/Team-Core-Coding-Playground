<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Post;
use DB;
use App\User;
use Auth;
use Mail;


class UserController extends Controller
{

    public function home() {
        return view('welcome');
    }
    public function login() {
        return view('user.login');
    }

    
    //Logout Function
    public function logout() {
        Auth::logout();
        return redirect()->route('project.home');
        //return view('user.logout');
    }
   
    //Create new user function
    public function create(Request $request)
    {
        try{

            $validateData=$this->validate($request->all(),[
                'name'       => 'required',
                'lname'      => 'required',
                'email'      => 'required|unique:users',
                'password'   => 'required|min:8',
                'passwordc'  => 'required_with:password|same:password|min:8'
            ]);

            $user = new User();
            $user->name     =   $request->name;
            $user->lname    =   $request->lname;
            $user->email    =   $request->email;
            $user->password =   $request->password;
            $user->save(); 
            
            return redirect()->route('project.home')->with(['success' => true, 'message' => 'Registered User Sucessfully!']);    
        
        } catch (Exception $exception) {

            return redirect()->route('project.home')->with(['success' => false, 'message' => $exception->getMessage()]);
            
        }
        
    }

    
    //Login function
    public function dologin(Request $request){
        $validateData=$request->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if(Auth::attempt($credentials)) {
        
            return redirect()->route('project.home');
        }   else {
            return redirect()->route('project.login')->with(['success' => false, 'message' => "Invalid credentials"]);     
        }
        
    }

   

    


    //Show post function 
    public function show($id)
    {
        $post= Post::find($id);
        return view ('post.show')->with('post',$post);
    }

    
}