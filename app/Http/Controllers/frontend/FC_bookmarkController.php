<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class FC_bookmarkController extends Controller
{
    public function index()
    {
        return view('frontend.clients.bookmark.index');
    }
}
