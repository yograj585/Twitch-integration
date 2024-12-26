<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return [
            "status" => 1,
            "data" => $blogs
        ];
    }

    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $blog = Blog::create($request->all());
        return [
            "status" => 1,
            "data" => $blog
        ];
    }

    
    public function show(Blog $blog)
    {
        return [
            "status" => 1,
            "data" =>$blog
        ];
    }

   
    public function edit(Blog $blog)
    {
        //
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $blog->update($request->all());

        return [
            "status" => 1,
            "data" => $blog,
            "msg" => "Blog updated successfully"
        ];
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return [
            "status" => 1,
            "data" => $blog,
            "msg" => "Blog deleted successfully"
        ];
    }
}