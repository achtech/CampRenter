<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CamperSubCategory;
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
        $sub_categories = CamperSubCategory::paginate(10);

        return view('frontend.camper.rent_out.rent_out')
            ->with('categories', $categories)
            ->with('sub_categories', $sub_categories);
    }

    public function personnalData()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out.personnal_data')->with('categories', $categories);
    }

    public function slide_camper()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out.slide_camper')->with('categories', $categories);
    }

    public function camper_steps()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out.camper_steps')->with('categories', $categories);
    }

    public function fill_in_vehicle()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out.fill_in_vehicle')->with('categories', $categories);
    }

    public function equipment()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out.equipment')->with('categories', $categories);
    }

    public function accessories()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out.accessories')->with('categories', $categories);
    }

    public function description()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out.description')->with('categories', $categories);
    }

    public function insurance()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out.insurance')->with('categories', $categories);
    }

    public function rental_terms()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out.rental_terms')->with('categories', $categories);
    }

    public function conditions()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out.conditions')->with('categories', $categories);
    }

    public function calendar()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out.calendar')->with('categories', $categories);
    }

}
