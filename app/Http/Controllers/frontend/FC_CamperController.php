<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Camper;
use App\Models\CamperCategory;
use App\Models\CamperImage;
use App\Models\CamperInsurance;
use App\Models\CamperReview;
use App\Models\CamperTerms;
use App\Models\Client;
use App\Models\Insurance;
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
        $campers = DB::table("campers")->where('is_deleted', 1)->where('id_clients', $client->id)->get();
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
        //$camper_inssurance = DB::table('camper_inssurance')->where('id_campers', $id)->first();
        $camper = Camper::find($id);
        $fuel = DB::table('fuels')->find($camper->id_fuels);
        $owner = Client::where('id', $camper->id_clients)->first();
        $category = CamperCategory::where('id', $camper->id_camper_categories)->first();
        $galleries = CamperImage::where('id_campers', $id)->get();
        $reviews = CamperReview::join('clients', 'clients.id', '=', 'camper_reviews.id_clients')->where('id_campers', $id)->get();

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
        $additionalAttributeArray = explode(',', $camper->additional_attribute);
        $additionalAttribute = "";
        foreach ($additionalAttributeArray as $item) {
            $additionalAttribute .= trans('front.' . $item) . ", ";
        }
        $additionalAttribute = substr($additionalAttribute, 1, -2);
        $booking_campers = Booking::where('id_booking_status', 4)->where('id_campers', $id)->first();

        $booked_campers = Booking::where('id_campers', $id)->where('id_booking_status', 4)->get();
        foreach ($booked_campers as $booked_camper) {
            $booked_camper->start_date = date("d-m-Y", strtotime($booked_camper->start_date));
            $booked_camper->end_date = date("d-m-Y", strtotime($booked_camper->end_date));
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
            ->with('booking_campers', $booking_campers)
            ->with('fuel', $fuel)
            ->with('booked_campers', $booked_campers)
            ->with('additionalAttribute', $additionalAttribute);
    }

    public function detailBookedCamper($id)
    {

        $camper_terms = DB::table('camper_terms')->where('id_campers', $id)->get();
        $camper_rental_terms = DB::table('camper_rental_terms')->where('id_campers', $id)->first();
        $camper_equipment = DB::table('camper_equipment')->where('id_campers', $id)->first();
        //$camper_inssurance = DB::table('camper_inssurance')->where('id_campers', $id)->first();
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

        $booking_campers = Booking::where('id_booking_status', 4)->where('id_campers', $id)->first();
        //dd($booking_campers);

        return view('frontend.clients.booking.detail.detail')
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
            ->with('booking_campers', $booking_campers);
    }

    public function bookingPaiement()
    {
        return view('frontend.camper.booking_paiement');
    }

    public function search(Request $request)
    {
        $stepsrc = false;
        $searchedLocation = $request->searchedLocation;

        $searchedDate = $request->searchedDate ?? date("F d, Y");
        $searchedCategories = $request->searchedCategories ?? '';
        $data = $this->getData();
        $camperEquipementIds = $this->searchByEquipment($request);
        $equipments = $this->getEquipmentNames($request);
        $start_date_s = date("F d, Y");
        $end_date_s = date("F d, Y");

        if ($camperEquipementIds != 0) {
            $data = $data->whereIn('id', $camperEquipementIds);
        }
        if (!empty($searchedLocation)) {
            $data = $this->searchingsnippet($searchedLocation);

            $stepsrc = true;
        }

        if (!empty($searchedDate)) {
            $tabDate = explode('-', $searchedDate);
            if (count($tabDate) == 2 && strtotime($tabDate[0]) && strtotime($tabDate[1])) {
                $start_date_s = $tabDate[0];
                $end_date_s = $tabDate[1];

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
        } else {
            //select * from campers where id not in (select id_campers from booking where start_date>today or end_date<today)
            $booking = Booking::whereDate('start_date', '<=', date('Y-m-d'))->orWhereDate('end_date', '>=', date('Y-m-d'))
                ->select('id_campers')->distinct()->get();
            $ids = array();
            foreach ($booking as $b) {
                $ids[] = $b->id_campers;
            }

            $data = $data->whereNotIn('id', $ids);
        }
        if (!empty($searchedCategories)) {
            $data = $data->whereIn('id_camper_categories', $searchedCategories);
        }

        if (!$stepsrc) {
            $data = $data->get();
        }

        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.camper.search')
            ->with('searchedDate', $searchedDate)
            ->with('searchedLocation', $searchedLocation)
            ->with('searchedCategories', $searchedCategories)
            ->with('categories', $categories)
            ->with('start_date_s', $start_date_s)
            ->with('end_date_s', $end_date_s)
            ->with('campers', $data)
            ->with('equipments', $equipments);
    }

    public function searchByEquipment(Request $request)
    {
        $ids = array();
        $exist = false;
        $data = DB::table('camper_equipment');
        if ($request->cooking_possibility == 'on') {$exist = true;
            $data->where('cooking_possibility', 1);}
        if ($request->sink == 'on') {$exist = true;
            $data->where('sink', 1);}
        if ($request->indoor_table == 'on') {$exist = true;
            $data->where('indoor_table', 1);}
        if ($request->dishes == 'on') {$exist = true;
            $data->where('dishes', 1);}
        if ($request->camping_chairs == 'on') {$exist = true;
            $data->where('camping_chairs', 1);}
        if ($request->water == 'on') {$exist = true;
            $data->where('water', 1);}
        if ($request->power == 'on') {$exist = true;
            $data->where('power', 1);}
        if ($request->cooling_possibility == 'on') {$exist = true;
            $data->where('cooling_possibility', 1);}
        if ($request->electronics == 'on') {$exist = true;
            $data->where('electronics', 1);}
        if ($request->camping_table == 'on') {$exist = true;
            $data->where('camping_table', 1);}
        if ($request->transport == 'on') {$exist = true;
            $data->where('transport', 1);}
        if ($request->additional_equipment_outside == 'on') {$exist = true;
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
    public function getEquipmentNames(Request $request)
    {
        $names = [];
        if ($request->cooking_possibility == 'on') {
            $names[] = 'cooking_possibility';
        }

        if ($request->sink == 'on') {
            $names[] = 'sink';
        }

        if ($request->indoor_table == 'on') {
            $names[] = 'indoor_table';
        }

        if ($request->dishes == 'on') {
            $names[] = 'dishes';
        }

        if ($request->camping_chairs == 'on') {
            $names[] = 'camping_chairs';
        }

        if ($request->water == 'on') {
            $names[] = 'water';
        }

        if ($request->power == 'on') {
            $names[] = 'power';
        }

        if ($request->cooling_possibility == 'on') {
            $names[] = 'cooling_possibility';
        }

        if ($request->electronics == 'on') {
            $names[] = 'electronics';
        }

        if ($request->camping_table == 'on') {
            $names[] = 'camping_table';
        }

        if ($request->transport == 'on') {
            $names[] = 'transport';
        }

        if ($request->additional_equipment_outside == 'on') {
            $names[] = 'additional_equipment_outside';
        }

        return $names;

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
            ->where('is_confirmed', '1')
            ->where('is_deleted', 1);
    }

    public function searchingsnippet($_param)
    {

        $mots = str_replace("+", " ", $_param);
        $mots = str_replace("\"", " ", $mots);

        $mots = str_replace(' ', ' ', $mots);
        $mots = str_replace('.', ' ', $mots);

        $mots = str_replace(",", " ", $mots); //
        $mots = str_replace("-", " ", $mots);

        $mots = mb_convert_case($mots, MB_CASE_LOWER, "UTF-8");
        // $mots = preg_replace('/[^A-Za-z0-9\-]/', ' ', $mots);
        $tab = explode(" ", $mots);

        //

        //Guisanpl. 4, 3014 Bern, Suisse

        if (count($tab) == 1) {
            $result = Camper::where('location', 'like', "%" . $mots . "%")
                ->where('is_confirmed', 1)
                ->where('is_deleted', 1)->get();

        } else {
            $last = $tab[count($tab) - 1];
            if (isset($last)) {
                $lastexe = $last; //with last string= Guisanpl. 4, 3014 Bern, Suisse
                array_pop($tab);

            } else {
                array_pop($tab); //without last string: =/Guisanpl. 4, 3014 Bern
            }

            for ($i = 0; $i < count($tab); $i++) {

                if ($tab[$i] != "") {
                    if ($lastexe) {

                        if (strpos($tab[$i], $lastexe) !== false) {
                            $found = true; //swisse

                        } else {
                            $found = false;
                        }

                    } else {
                        $found = false;
                    }

                    $motcle = $this->clean($tab[$i]);

                    if (!$found):
                        $result = Camper::where('location', 'like', "%" . $motcle . "%")
                            ->where('is_confirmed', 1)
                            ->where('is_deleted', 1)

                            ->get();
                        // ->orWhere('city', 'LIKE', '%' . $tab[$i] . '%')
                        // ->orWhere('country', 'LIKE', '%' . $tab[$i] . '%');
                    endif;

                }

            }

        }

        return $result;

    }

    public function clean($string)
    {
        return $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.

        // return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
    public function getOwnerDetail($id_camper)
    {
        $camper = DB::table('campers')->find($id_camper);
        $owner = DB::table('clients')->where('id', $camper->id_clients)->first();
        $campers_owner = DB::table('campers')->where('is_deleted', 1)->where('is_confirmed', 1)->where('id_clients', $owner->id)->get();
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

    public static function getCamperPriceCurrentSaison($id)
    {
        $sMonth = date('m');
        $saisons = CamperTerms::where('id_campers', $id)
            ->where(function ($query) use ($sMonth) {
                $query->where('start_month', $sMonth)
                    ->orWhere('end_month', $sMonth);
            })
            ->first();
        $saisons = $saisons != null ? $saisons : CamperTerms::where('id_campers', $id)->where('start_month', 11)->first();
        $camperPrice = $saisons != null ? $saisons->price_per_night : 0;
        $camper = Camper::find($id);
        $hasInsurance = $camper->has_insurance == 1;
        $insurance = 0;
        $t = $camper->allowed_total_weight > 3.5 ? ">3" : "<=3";
        if ($hasInsurance) {
            $getInsurance = Insurance::where('id_camper_categories', $camper->id_camper_categories)
                ->where('nbr_days_from', 1)
                ->where('tonage', $t)
                ->first();
            $insurance = $getInsurance != null ? $getInsurance->price_per_day + $getInsurance->initial_price : 0;
        }
        $extras = CamperInsurance::join('insurance_extra', 'insurance_extra.id', '=', 'camper_insurances.id_insurance_extra')
            ->where('id_campers', $camper->id)
            ->where('nbr_days_from', 1)
            ->sum(\DB::raw('price_per_day + initial_price'));

        return $insurance + $extras + $camperPrice;
    }

}
