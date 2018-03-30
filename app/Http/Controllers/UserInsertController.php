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

    $validatedData = $request->validate([
        'email' => 'required|email',
        'pass' => 'required',
        'conpass' => 'required|same:pass|min:8',
        'mobile' => 'required'
    ]); 

    $user = new User;
    $user->email = Input::get('email');
    $user->password = md5(Input::get('pass'));
    $user->mobile = Input::get('mobile');
    $user->save();  
    //return Redirect::back();
    return Redirect::to('/');
}



}
