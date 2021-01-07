<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\models\Booking;
use App\models\Camper;
use App\models\Notification;
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
        dd($request->id_campers);
        $searchedDate = $request->searchedDate ?? '';
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
        $booking = DB::table("v_bookings_owner")->where('id', $id)->first();
        return view('frontend.clients.booking.booking_paiement')
            ->with('booking', $booking);
    }

}
