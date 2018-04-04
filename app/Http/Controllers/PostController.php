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

    public function postList()
    {
    	$post= Post::all();
    	return view('post.listPost',['post' => $post]);
    }

    public function deletePost(Request $request)
    {	
    	$post=Post::where('id', $request->post_id)->first();
    	Post::where('id', $request->post_id)->delete();
    	return redirect()->route('project.mypost')->with(['success' => true, 'message' => 'Your post is deleted successfully!']);
    }

}
