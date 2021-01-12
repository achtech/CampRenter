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
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
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
        if ($owner->photo != null) {
            $owner_photo = $owner->photo;
        } else {
            $avatar = DB::table('avatars')->find($owner->id_avatars);
            $owner_photo = $avatar ? $avatar->image : 'default.jpg';
        }

        return view('frontend.camper.detail')
            ->with('camper', $camper)
            ->with('category', $category)
            ->with('galleries', $galleries)
            ->with('owner', $owner)
            ->with('reviews', $reviews)
            ->with('rateCamper', $rateCamper)
            ->with('rateDetail', $rateDetail)
            ->with('categories', $categories)
            ->with('camper_terms', $camper_terms)
            ->with('camper_rental_terms', $camper_rental_terms)
            ->with('camper_equipment', $camper_equipment)
            ->with('owner_photo', $owner_photo)
            ->with('camper_inssurance', $camper_inssurance);
    }

    public function bookingPaiement()
    {
        return view('frontend.camper.booking_paiement');
    }

    public function search(Request $request)
    {
        $searchedLocation = $request->searchedLocation;

        $searchedDate = $request->searchedDate ?? '';
        $searchedCategories = $request->searchedCategories ?? '';
        $data = $this->getData();
        $camperEquipementIds = $this->searchByEquipment($request);
        if ($camperEquipementIds != 0) {
            $data = $data->whereIn('id', $camperEquipementIds);
        }
        if (!empty($searchedLocation)) {
            $data = $this->searchingsnippet($searchedLocation);
        }
        if (!empty($searchedDate)) {
            $tabDate = explode('-', $searchedDate);
            if (count($tabDate) == 2 && strtotime($tabDate[0]) && strtotime($tabDate[1])) {
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
        if ($request->cooking_possibility) {$exist = true;
            $data->where('cooking_possibility', 1);}
        if ($request->sink) {$exist = true;
            $data->where('sink', 1);}
        if ($request->indoor_table) {$exist = true;
            $data->where('indoor_table', 1);}
        if ($request->dishes) {$exist = true;
            $data->where('dishes', 1);}
        if ($request->camping_chairs) {$exist = true;
            $data->where('camping_chairs', 1);}
        if ($request->water) {$exist = true;
            $data->where('water', 1);}
        if ($request->power) {$exist = true;
            $data->where('power', 1);}
        if ($request->cooling_possibility) {$exist = true;
            $data->where('cooling_possibility', 1);}
        if ($request->electronics) {$exist = true;
            $data->where('electronics', 1);}
        if ($request->camping_table) {$exist = true;
            $data->where('camping_table', 1);}
        if ($request->transport) {$exist = true;
            $data->where('transport', 1);}
        if ($request->additional_equipment_outside) {$exist = true;
            $data->where('additional_equipment_outside', 1);}

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

    public function searchingsnippet($_param)
    {

        $mots = str_replace("+", " ", $_param);
        $mots = str_replace("\"", " ", $mots);

        $mots = str_replace(' ', ' ', $mots);
        $mots = str_replace(",", " ", $mots);
        $mots = str_replace("-", " ", $mots);

        $mots = mb_convert_case($mots, MB_CASE_LOWER, "UTF-8");
        $mots = preg_replace('/[^A-Za-z0-9\-]/', ' ', $mots);
        $tab = explode(" ", $mots);

        // Rabat Ville, Avenue Mohammed
        for ($i = 0; $i < count($tab); $i++) {
            if ($tab[$i] != '') {

                $result = Camper::where('location', 'LIKE', '%' . $tab[$i] . '%')
                    ->where('is_confirmed', '1')
                    ->orWhere('city', 'LIKE', '%' . $tab[$i] . '%')
                    ->orWhere('country', 'LIKE', '%' . $tab[$i] . '%');

            }

        }

        return $result;

    }

    public function getOwnerDetail($id_camper)
    {
        $camper = DB::table('campers')->find($id_camper);
        $owner = DB::table('clients')->where('id', $camper->id_clients)->first();
        $campers_owner = DB::table('campers')->where('id_clients', $owner->id)->get();
        $reviews_client = DB::table('camper_reviews')->where('id_campers', $id_camper)->get();
        if ($owner->photo != null) {
            $owner_photo = $owner->photo;
        } else {
            $avatar = DB::table('avatars')->find($owner->id_avatars);
            $owner_photo = $avatar ? $avatar->image : 'default.jpg';
        }
        return view('frontend.camper.detail.owner_detail')
            ->with('owner', $owner)
            ->with('owner_photo', $owner_photo)
            ->with('reviews_client', $reviews_client)
            ->with('campers_owner', $campers_owner);
    }
}
