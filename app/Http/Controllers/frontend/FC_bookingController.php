<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class FC_bookingController extends Controller
{
    //frontend.clients.booking
    public function index()
    {
        return view('frontend.clients.booking.index');
    }
}
