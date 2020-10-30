<?php

namespace App\Http\Controllers\frontend;

use DB;
use App\Http\Controllers\Controller;

class FC_CamperController extends Controller
{
    //
    public function index()
    {
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.clients.camper.index')->with('categories', $categories);
    }

    public function show()
    {
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.camper.searchCamper')->with('categories', $categories);
    }

    public function detail()
    {
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.camper.detail')->with('categories', $categories);
    }
}
