<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
//

class PostController extends Controller
{
   
 public function show() 
 {
     
            return view('auth.Dpost');

}


function message_given(Request $request) {

    $validatedData = $this->validate($request,[
        'title' => 'required',
        'body' => 'required'
    ]); 



    $post = new Post;
    $post->title = $request->title;
    $post->body = $request->body;
    $post->save();  
    return redirect()->route('project.home')->with(['success' => true,'message' => 'You are registered successfully']);
}


   
}