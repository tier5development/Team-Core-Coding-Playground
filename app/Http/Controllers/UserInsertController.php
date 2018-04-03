<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;

class UserInsertController extends Controller
{

function insert(Request $request) {

    $validatedData = $this->validate($request,[
        'email' => 'required|email|unique:users',
        'pass' => 'required|min:8',
        'conpass' => 'required|same:pass',
        'mobile' => 'required|integer'
    ],[
        'mobile.required' => 'mobile number is required',
    ]); 



    $user = new User;
    $user->email = $request->email;
    $user->password = bcrypt($request->pass);
    $user->mobile = $request->mobile;
    $user->save();  
    return redirect()->route('project.home')->with(['success' => true,'message' => 'You are registered successfully']);
}



}
