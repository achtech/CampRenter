<?php

namespace App\Http\Controllers\frontend;

use DB;
use App\Http\Controllers\Controller;

class FC_notificationController extends Controller
{
    public function index()
    {
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.clients.notification.index')->with('categories', $categories);
    }
}
