<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CamperSubCategory;
use DB;

class FCamperController extends Controller
{
    public function __construct()
    {
        if (Controller::getConnectedClient() == null) {
     //       return view('frontend.login.client');
        }
    }

    public function index()
    {
        return view('frontend.camper.index');
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
        return view('frontend.camper.rent_out.personnal_data');
    }

    public function slide_camper()
    {
        return view('frontend.camper.rent_out.slide_camper');
    }

    public function camper_steps()
    {
        return view('frontend.camper.rent_out.camper_steps');
    }

    public function fill_in_vehicle()
    {
        return view('frontend.camper.rent_out.fill_in_vehicle');
    }

    public function equipment()
    {
        return view('frontend.camper.rent_out.equipment');
    }

    public function accessories()
    {
        return view('frontend.camper.rent_out.accessories');
    }

    public function description()
    {
        return view('frontend.camper.rent_out.description');
    }

    public function insurance()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.rent_out.insurance')->with('categories', $categories);
    }

    public function rental_terms()
    {
        return view('frontend.camper.rent_out.rental_terms');
    }

    public function conditions()
    {
        return view('frontend.camper.rent_out.conditions');
    }

    public function calendar()
    {
        return view('frontend.camper.rent_out.calendar');
    }

}
