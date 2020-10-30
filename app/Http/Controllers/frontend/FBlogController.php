<?php

namespace App\Http\Controllers\frontend;

use DB;
use App\Http\Controllers\Controller;

class FBlogController extends Controller
{
    //
    public function index()
    {
        $blogs = DB::table('blogs')->get();
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.blog.index')->with('blogs', $blogs)->with('categories', $categories);
    }
     //
    public function show()
    {
        $blogs = DB::table('blogs')->get();
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.blog.detail')->with('blogs', $blogs)->with('categories', $categories);
    }
}