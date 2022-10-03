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
        $post = Post::with('categories')->get();
        return view('layouts.post.index')->with(compact('post','categories'));
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
        return redirect()->route('post.index')->with('success','Post Insert Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $post = Post::find($post);
        $category = CategoryPost::all();
        return view('layouts.post.show')->with(compact('category','post'));
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
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->get('title');  
        $post->short_desc = $request->get('short_desc');
        $post->desc = $request->get('desc');
        $post->category_id = $request->get('category_id');
              
        if ($request['image']){
            unlink('uploads/'.$post->image);
            $image = $request['image'];
            $ext = $image->getClientOriginalExtension();
            $name = time().' '.$image->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($image));
            $post->image = $name;
        }
        
        $post->save();
        return redirect()->route('post.index')->with('success','Post Updated Successfuly');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $path = 'uploads/';
        $post = Post::find($post);
        unlink($path.$post->image);
        $post->delete();
        return redirect()->back();
    }
}
