<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class FC_messageController extends Controller
{
    public function index()
    {
        return view('frontend.clients.message.index');
    }

    public function show()
    {
        return view('frontend.clients.message.detail');
    }
}
