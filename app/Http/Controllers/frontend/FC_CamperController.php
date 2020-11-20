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
        $client = Controller::getConnectedClient();
        $campers = DB::table("campers")->where('id_clients', $client->id)->get();
        return view('frontend.clients.camper.index')
            ->with('campers', $campers);
    }

    public function show()
    {
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.search')
            ->with('categories', $categories);
    }

    public function detail($id)
    {
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
        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.camper.detail')
            ->with('camper', $camper)
            ->with('category', $category)
            ->with('galleries', $galleries)
            ->with('owner', $owner)
            ->with('categories', $categories)
            ->with('reviews', $reviews)
            ->with('rateCamper', $rateCamper)
            ->with('rateDetail', $rateDetail)
            ->with('categories', $categories)
            ->with('camper_terms', $camper_terms)
            ->with('camper_rental_terms', $camper_rental_terms)
            ->with('camper_equipment', $camper_equipment)
            ->with('camper_inssurance', $camper_inssurance);
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
        $camperEquipementIds = $this->searchByEquipment($request);
        if ($camperEquipementIds != 0) {
            $data = $data->whereIn('id', $camperEquipementIds);
        }

        if (!empty($searchedLocation)) {
            //TODO
        }
        if (!empty($searchedDate)) {
            $tabDate = explode('-', $searchedDate);
            $startDate = date("Y-m-d", strtotime($tabDate[0]));
            $endDate = date("Y-m-d", strtotime($tabDate[1]));
            $bookings = DB::table('bookings')->where(function ($query) use ($endDate) {
                $query->where('start_date', '<', $endDate)
                    ->where('end_date', '>', $endDate);
            })
                ->orWhere(function ($query) use ($startDate) {
                    $query->where('start_date', '<', $startDate)
                        ->where('end_date', '>', $startDate);
                })
                ->orWhere(function ($query) use ($startDate, $endDate) {
                    $query->where('start_date', '>', $startDate)
                        ->where('end_date', '<', $endDate);
                })
                ->select('id_campers')->get();
            $ids = array();
            foreach ($bookings as $b) {
                $ids[] = $b->id_campers;
            }
            $data = $data->whereNotIn('id', $ids);
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

    public function searchByEquipment(Request $request)
    {
        $ids = array();
        $exist = false;
        $data = DB::table('camper_equipment');
        if ($request->is_burner_stove_exist) {$exist = true;
            $data->where('is_burner_stove_exist', 1);}
        if ($request->is_sink_exist) {$exist = true;
            $data->where('is_sink_exist', 1);}
        if ($request->is_indoor_table_exist) {$exist = true;
            $data->where('is_indoor_table_exist', 1);}
        if ($request->is_dishes_exist) {$exist = true;
            $data->where('is_dishes_exist', 1);}
        if ($request->is_camping_chairs_exist) {$exist = true;
            $data->where('is_camping_chairs_exist', 1);}
        if ($request->is_water_tank_exist) {$exist = true;
            $data->where('is_water_tank_exist', 1);}
        if ($request->is_power_supply_exist) {$exist = true;
            $data->where('is_power_supply_exist', 1);}
        if ($request->is_fridge_exist) {$exist = true;
            $data->where('is_fridge_exist', 1);}
        if ($request->is_cd_player_exist) {$exist = true;
            $data->where('is_cd_player_exist', 1);}
        if ($request->is_camping_table_exist) {$exist = true;
            $data->where('is_camping_table_exist', 1);}
        if ($request->is_trailer_hitch_exist) {$exist = true;
            $data->where('is_trailer_hitch_exist', 1);}
        if ($request->is_gas_cooker_exist) {$exist = true;
            $data->where('is_gas_cooker_exist', 1);}

        if ($exist) {
            $data = $data->select('id_campers')->get();
            foreach ($data as $e) {
                $ids[] = $e->id_campers;
            }
            return $ids;
        } else {
            return 0;
        }

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
