<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Post;
use DB;
use App\User;


class RegisterController extends Controller
{

    public function home() {
        return view('welcome');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {/*
      $posts = DB::select('select * from posts');
        return view ('post.index',['posts'=>$posts]);
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'name' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'passwordc' => 'required_with:password|same:password|min:8'
        ]);

        $user = new User();
        $user->name     =   $request->name;
        $user->lname    =   $request->lname;
        $user->email    =   $request->email;
        $user->password =   $request->password;
        $user->save(); 
        
        return redirect()->route('project.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function login(){
        
    }

    public function show($id)
    {
        $post= Post::find($id);
        return view ('post.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
