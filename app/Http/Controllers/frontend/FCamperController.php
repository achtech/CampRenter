<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use DB;

class FCamperController extends Controller
{
    //
    public function index()
    {
        $categories = DB::table('camper_categories')->paginate(10);
        //$campers = DB::table('campers')->paginate(10);
        //$review = DB::table('campers')->get();
        return view('frontend.camper.index')->with('categories', $categories);
    }

    public function rent_out()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out')->with('categories', $categories);
    }

    public function rent_out_details()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out_details')->with('categories', $categories);
    }

    public function slide_camper()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.slide_camper')->with('categories', $categories);
    }

}
