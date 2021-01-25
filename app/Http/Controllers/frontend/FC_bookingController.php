<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Camper;
use App\Models\CamperTerms;
use App\Models\Insurance;
use App\Models\Notification;
use App\Models\Promotion;
use DB;
use Illuminate\Http\Request;

class FC_bookingController extends Controller
{

    //frontend.clients.booking
    public function index()
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $ownerBookings = DB::table("v_bookings_owner")->where('id_owners', $client->id)->orderBy('id', 'desc')->get();
        $renterBookings = DB::table("v_bookings_owner")->where('id_renters', $client->id)->orderBy('id', 'desc')->get();
        return view('frontend.clients.booking.index')
            ->with('ownerBookings', $ownerBookings)
            ->with('renterBookings', $renterBookings);
    }

    public function requestBooking(Request $request)
    {
        $searchedDate = $request->searchedDate ?? '';
        $camper = Camper::find($request->id_campers);
        if ($searchedDate != '') {
            $client = Controller::getConnectedClient();
            if ($client == null) {
                return redirect(route('frontend.login.client'));
            }
            $tabDate = explode('-', $searchedDate);
            $startDate = date("Y-m-d", strtotime($tabDate[0]));
            $endDate = date("Y-m-d", strtotime($tabDate[1]));
            $booking = new Booking();
            $booking->start_date = $startDate;
            $booking->end_date = $endDate;
            $booking->id_clients = $client ? $client->id : 0;

            $booking->id_campers = $request->id_campers;
            $booking->id_booking_status = 1;
            $booking->status_billings = 'Not paid';
            $booking->commission = Promotion::where('status', 1)->first()->commission;
            $booking->total = $this->getBookingWithoutInsurance($request->id_campers, $startDate, $endDate);

            $booking->save();

            $camper = Camper::find($request->id_campers);
            $notification = new Notification();
            $notification->id_renter = $booking->id_clients;
            $notification->id_owner = $camper->id_clients;
            $notification->id_table = $booking->id;
            $notification->message = "You have new booking for your camper : " . $camper->camper_name . " from : " . $client->client_last_name . " " . $client->client_name;
            $notification->type = "Booking";
            $notification->status = "unread";
            $notification->save();
        }
    }

    public function detailBookingOwner($id)
    {
        $notification = Notification::where('type', 'Booking')->where('id_table', $id)->first();
        if ($notification) {
            $notification->status = "readed";
            $notification->save();
        }

        $booking = DB::table("v_bookings_owner")->where('id', $id)->first();
        return view('frontend.clients.booking.detail1')
            ->with('booking', $booking);
    }

    public function confirmBookingOwner($id)
    {
        $booking = Booking::find($id);
        $booking->id_booking_status = 2;
        $booking->save();

        $camper = Camper::find($booking->id_campers);
        $notification = new Notification();
        $notification->id_renter = $booking->id_clients;
        $notification->id_owner = $camper->id_clients;
        $notification->id_table = $booking->id;
        $notification->message = "Your request for camper " . $camper->camper_name . " between  : " . $booking->start_date . " and " . $booking->end_date . " is CONFIRMED";
        $notification->type = "Booking";
        $notification->status = "unread";
        $notification->save();

        return redirect(route('frontend.clients.booking'));
    }

    public function rejectBookingOwner($id)
    {
        $booking = Booking::find($id);
        $booking->id_booking_status = 3;
        $booking->save();

        $camper = Camper::find($booking->id_campers);
        $notification = new Notification();
        $notification->id_renter = $booking->id_clients;
        $notification->id_owner = $camper->id_clients;
        $notification->id_table = $booking->id;
        $notification->message = "Your request for camper " . $camper->camper_name . " between  : " . $booking->start_date . " and " . $booking->end_date . " is REJECTED";
        $notification->type = "Booking";
        $notification->status = "unread";
        $notification->save();

        return redirect(route('frontend.clients.booking'));
    }

    public function processBookingRenter($id)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $booking = DB::table("v_bookings_owner")->where('id', $id)->first();
        $camper = Camper::find($booking->id_campers);
        $t = $camper->allowed_total_weight > 3.5 ? ">3" : "<=3";
        $hasTonz = Insurance::where('id_camper_categories', $camper->id_camper_categories)->first();
        $tons = $hasTonz->tonage != null ? $t : 0;
        $insurance_total = Controller::getInsurance($camper->id_camper_categories, $booking->nbr_days, $tons);

        $insurance = Insurance::where('id_camper_categories', $camper->id_camper_categories)
            ->where('nbr_days_from', "<=", $booking->nbr_days)
            ->where('nbr_days_To', ">=", $booking->nbr_days);
        $insurance = $tons == 0 ? $insurance->first() : $insurance->where('tonage', $tons)->first();

        if ($insurance == null) {
            $insurance = Insurance::where('id_camper_categories', $camper->id_camper_categories)->whereNull('nbr_days_To');
            $insurance = $tons == 0 ? $insurance->first() : $insurance->where('tonage', $tons)->first();
        }

        $extras = DB::table('insurance_extra')
            ->select('name')
            ->groupBy('name')
            ->get();

        $camper_extra = DB::table('camper_insurances')->join('insurance_extra', 'insurance_extra.id', '=', 'camper_insurances.id_insurance_extra')->where('id_campers', $camper->id)->select('name')->get()->toArray();
        $extraIds = [];
        $totalExtra = 0;
        foreach ($camper_extra as $item) {
            $extraIds[] = $item->name;
            $totalExtra += Controller::getExtraInsurance($item->name, $booking->nbr_days);
        }
        $total_without_insurance = $this->getBookingWithoutInsurance($booking->id_campers, $booking->start_date, $booking->end_date);
        $totalBooking = $total_without_insurance + $insurance_total + $totalExtra;
        return view('frontend.clients.booking.booking_paiement')
            ->with('booking', $booking)
            ->with('insurance_total', $insurance_total)
            ->with('insurance', $insurance)
            ->with('camper', $camper)
            ->with('extras', $extras)
            ->with('extraIds', $extraIds)
            ->with('total_without_insurance', $total_without_insurance)
            ->with('totalBooking', $totalBooking);
    }

/**
 * 7-8 main
 * 5-6  off
 * 9-10 off
 * 11-4 winter
 */
/**
 * case 1 : same month => (pricePerDay+insurance) * nbrOfDays
 * case 2 : different month but same saison => (pricePerDay+insurance) * nbrOfDays
 * case 3 : different month and different saison => ((pricePerDay1+insurance) * nbrOfDaysOfFirstSaison)+((pricePerDay2+insurance) * nbrOfDaysOfSecondSaison)
 */
    private function getBookingWithoutInsurance($id, $start_date, $end_date)
    {

        $sMonth = date('m', strtotime($start_date));
        $eMonth = date('m', strtotime($end_date));
        $total = 0;
        $sameSaison = ($sMonth == 5 && $eMonth == 6) || ($sMonth == 7 && $eMonth == 8) || ($sMonth == 9 && $eMonth == 10)
            || ($sMonth == 11 && $eMonth == 12) || ($sMonth == 12 && $eMonth == 1) || ($sMonth <= 4 && $eMonth <= 4);
        if ($sMonth == $eMonth || $sameSaison) {
            $nbrDays = Controller::diffDate($start_date, $end_date);
            $sMonth = $sMonth == 9 ? 5 : ($sMonth == 10 ? 5 : $sMonth);
            $eMonth = $eMonth == 9 ? 6 : ($eMonth == 10 ? 6 : $eMonth);
            $sMonth = $sMonth == 12 || $sMonth <= 4 ? 11 : $sMonth;
            $eMonth = $eMonth == 12 || $eMonth <= 4 ? 4 : $eMonth;
            $pricePerDay = CamperTerms::where('id_campers', $id)
                ->where(function ($query) use ($sMonth) {
                    $query->where('start_month', $sMonth)
                        ->orWhere('end_month', $sMonth);
                })
                ->first();
            $total = ($pricePerDay ? $pricePerDay->price_per_night : 0) * $nbrDays;
        } else {
            $nbrDays1 = Controller::diffDate($start_date, date("Y-m-t", strtotime($start_date)));
            $nbrDays2 = Controller::diffDate(date("Y-m-01", strtotime($end_date)), $end_date);
            $sMonth = $sMonth == 9 ? 5 : ($sMonth == 10 ? 5 : $sMonth);
            $eMonth = $eMonth == 9 ? 6 : ($eMonth == 10 ? 6 : $eMonth);

            $pricePerDay1 = CamperTerms::where('id_campers', $id)
                ->where(function ($query) use ($sMonth) {
                    $query->where('start_month', $sMonth)
                        ->orWhere('end_month', $sMonth);
                })
                ->first()->price_per_night;

            $pricePerDay2 = CamperTerms::where('id_campers', $id)
                ->where(function ($query) use ($eMonth) {
                    $query->where('start_month', $eMonth)
                        ->orWhere('end_month', $eMonth);
                })
                ->first()->price_per_night;

            $total = ($pricePerDay1 ? $pricePerDay1->price_per_night : 0) * ($nbrDays1 + 1) + ($pricePerDay2 ? $pricePerDay2->price_per_night : 0) * $nbrDays2;
        }
        return $total;
    }

}
