<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class FC_bookmarkController extends Controller
{
    public function index()
    {
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.clients.bookmark.index')->with('categories', $categories);
    }
}
