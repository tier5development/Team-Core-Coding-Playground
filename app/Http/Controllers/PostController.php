<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('view_posts' ,compact('posts'));
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
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
           // 'image' => 'image|mimes:jpg,png',
            ]);  


//     f($request->hasFile('image')) {
// $extension = File::extension($request->image->getClientOriginalName());
// if (strtolower($extension) == "jpeg" || strtolower($extension) == "jpg" || strtolower($extension) == "png") {
// $file = $request->image;
// $fileName = time() . '.' . $extension;
// $filePath = public_path() . "/image_logo";
// $file->move($filePath, $fileName);
// }
// }


        $posts = new Post();
        $posts->title      = $request['title'];
        $posts->body       = $request['body'];
        $posts->save();
        return redirect('/create_post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id=NULL)
    {
        $post = Post::findOrFail($id);
        return view('edit_post' , compact('post','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        
        DB::beginTransaction();
        try
        {
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();
            DB::commit();

            return redirect()->route('viewposts');
        }
        catch(Exception $e)
        {
            echo "Sql Updation error".$e->getMessage();
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return back();
    }
}
