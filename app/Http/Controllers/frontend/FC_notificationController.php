<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class FC_notificationController extends Controller
{
    public function index()
    {
        return view('frontend.clients.notification.index');
    }
}
