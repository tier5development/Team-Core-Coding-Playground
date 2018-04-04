<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

class PostController extends Controller
{
    
    
	 
    //create Post function
    public function createPost(Request $request){

    	$post = new Post();
    	$post->title = $request->title; 
    	$post->description = $request->description;
    	$post->userEmail = Auth::user()->email;
    	$post->save();

    	 return redirect()->route('project.home')->with(['success' => true, 'message' => 'Your post is created successfully!']);

    }

    public function showPost(){
    	$post= Post::all();
    	return view('post.postHome',['post' => $post]); 
    }

}
