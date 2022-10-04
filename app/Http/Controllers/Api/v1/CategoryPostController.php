<?php

namespace App\Http\Controllers\Api\v1;

use App\CategoryPost;
use Illuminate\Http\Request;
use Session;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = CategoryPost::all();
        return view('layouts.category.index')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('layouts.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new CategoryPost();
        $category->title = $request->title;
        $category->short_desc2 = $request->short_desc2;
        $category->save();
        return redirect()->route('category.index')->with('success','Category Inserted Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function show($categoryPost)
    {
        $category = CategoryPost::find($categoryPost);
        return view('layouts.category.show')->with(compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryPost $categoryPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryPost)
    {
        $data = $request->all();
        $category = CategoryPost::find($categoryPost);
        $category->title = $data['title'];
        $category->short_desc2 = $request->short_desc2;
        $category->save();
        // Session::put('success','Category Updated Successfuly');
        // Session::save();
        return redirect()->route('category.index')->with('success','Category Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $category = CategoryPost::find($id);
        $category->delete();
        return redirect()->back();
    }
}
