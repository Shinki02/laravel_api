<?php

namespace App\Http\Controllers\Api\v1;

use App\Post;
use App\CategoryPost;
use Storage;
use File;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = CategoryPost::all();
        $post = Post::all();
        return view('layouts.post.index',compact('post','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CategoryPost::all();
        return view('layouts.post.create')->with(compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $post = new Post();
        $post->title = $request->title;
        $post->short_desc = $request->short_desc;
        $post->desc = $request->desc;
        $post->category_id = $request->category_id;
              
        if ($request['image']){
            $image = $request['image'];
            $ext = $image->getClientOriginalExtension();
            $name = time().''.$image->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($image));
            $post->image = $name;
        }else{
            $post->image = 'default.jpg';
        }
        $post->save();
        return redirect()->back();
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
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
