<?php

namespace App\Http\Controllers\frontend;

use DB;
use App\Http\Controllers\Controller;
use App\Models\Camper;
use App\Models\Client;
use App\Models\CamperImage;
use App\Models\CamperReview;
use App\Models\CamperCategory;

class FC_CamperController extends Controller
{
    //
    public function index()
    {
        $categories = DB::table('camper_categories')->get();
        return view('frontend.clients.camper.index')->with('categories', $categories);
    }

    public function show()
    {
        $categories = DB::table('camper_categories')->get();
        return view('frontend.camper.searchCamper')->with('categories', $categories);
    }

    public function detail($id)
    {
        $categories = DB::table('camper_categories')->get();
        $camper_terms = DB::table('camper_terms')->where('id_campers', $id)->get();
        $camper_rental_terms = DB::table('camper_rental_terms')->where('id_campers', $id)->first();
        $camper_equipment = DB::table('camper_equipment')->where('id_campers', $id)->first();
        $camper_inssurance = DB::table('camper_inssurance')->where('id_campers', $id)->first();
        $camper = Camper::find($id);
        $owner = Client::where('id', $camper->id_clients)->first();
        $category = CamperCategory::where('id', $camper->id_camper_categories)->first();
        $galleries = CamperImage::where('id_campers', $id)->get();
        $reviews = CamperReview::where('id_campers', $id)->get();

        $rateData = DB::table('v_rate_camper')->where('id_campers', $id)->first();
        $rateCamper = $rateData ? $rateData->rate : 0;

        $rateDetail = DB::table('v_rate_camper_detail')->where('id_campers', $id)->first();

        return view('frontend.camper.detail')
            ->with('camper', $camper)
            ->with('category', $category)
            ->with('galleries', $galleries)
            ->with('owner', $owner)
            ->with('categories', $categories)
            ->with('reviews', $reviews)
            ->with('rateCamper', $rateCamper)
            ->with('rateDetail', $rateDetail)
            ->with('camper_terms', $camper_terms)
            ->with('camper_rental_terms', $camper_rental_terms)
            ->with('camper_equipment', $camper_equipment)
            ->with('camper_inssurance', $camper_inssurance);
    }

    public function bookingPaiement()
    {
        $categories = DB::table('camper_categories')->get();
        return view('frontend.camper.booking_paiement')->with('categories', $categories);
    }
}
