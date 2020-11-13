<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Camper;
use App\Models\CamperCategory;
use App\Models\CamperImage;
use App\Models\CamperReview;
use App\Models\Client;
use DB;
use Illuminate\Http\Request;

class FC_CamperController extends Controller
{
    //
    public function index()
    {
        return view('frontend.clients.camper.index');
    }

    public function show()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.search')
            ->with('categories', $categories);
    }

    public function detail($id)
    {
        $camper = Camper::find($id);
        $owner = Client::where('id', $camper->id_clients)->first();
        $category = CamperCategory::where('id', $camper->id_camper_categories)->first();
        $galleries = CamperImage::where('id_campers', $id)->get();
        $reviews = CamperReview::where('id_campers', $id)->get();

        $rateData = DB::table('v_rate_camper')->where('id_campers', $id)->first();
        $rateCamper = $rateData ? $rateData->rate : 0;

        $rateDetail = DB::table('v_rate_camper_detail')->where('id_campers', $id)->first();
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.detail')
            ->with('camper', $camper)
            ->with('category', $category)
            ->with('galleries', $galleries)
            ->with('owner', $owner)
            ->with('reviews', $reviews)
            ->with('rateCamper', $rateCamper)
            ->with('rateDetail', $rateDetail)
            ->with('categories', $categories)
        ;
    }

    public function bookingPaiement()
    {
        return view('frontend.camper.booking_paiement');
    }

    public function search(Request $request)
    {
        $searchedLocation = $request->searchedLocation ?? '';
        $searchedDate = $request->searchedDate ?? '';
        $searchedCategories = $request->searchedCategories ?? '';
        $data = $this->getData();
        if (!empty($searchedLocation)) {
            //TODO
        }
        if (!empty($searchedDate)) {
            //TODO
        }
        if (!empty($searchedCategories)) {
            $data = $data->whereIn('id_camper_categories', $searchedCategories);
        }
        $data = $data->get();
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.camper.search')
            ->with('searchedDate', $searchedDate)
            ->with('searchedLocation', $searchedLocation)
            ->with('searchedCategories', $searchedCategories)
            ->with('categories', $categories)
            ->with('campers', $data);
    }

    public function searchByCategory($id)
    {
        $searchedCategory = $id ?? '';
        $data = $this->getData();
        if (!empty($searchedCategory)) {
            $data = $data->where('id_camper_categories', $searchedCategory);
        }
        $data = $data->get();
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.camper.search')
            ->with('searchedCategory', $id)
            ->with('campers', $data)
            ->with('categories', $categories);
    }

    public function getData()
    {
        return DB::table('campers')
            ->where('is_confirmed', '1');
    }
}
