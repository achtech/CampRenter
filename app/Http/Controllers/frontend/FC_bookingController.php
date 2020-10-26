<?php

namespace App\Http\Controllers\frontend;

use DB;
use App\Http\Controllers\Controller;


class FC_bookingController extends Controller
{
    //frontend.clients.booking
    public function index()
    {
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.clients.booking.index')->with('categories', $categories);
    }
}
