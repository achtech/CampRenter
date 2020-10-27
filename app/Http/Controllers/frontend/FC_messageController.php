<?php

namespace App\Http\Controllers\frontend;

use DB;
use App\Http\Controllers\Controller;

class FC_messageController extends Controller
{
    public function index()
    {
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.clients.message.index')->with('categories', $categories);
    }

    public function show()
    {
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.clients.message.detail')->with('categories', $categories);
    }
}
