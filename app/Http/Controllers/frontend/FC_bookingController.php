<?php

namespace App\Http\Controllers\frontend;

use App\models\Booking;
use App\models\Camper;
use App\models\Notification;
use App\models\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class FC_bookingController extends Controller
{
    //frontend.clients.booking
    public function index()
    {
        $client = Controller::getConnectedClient();
        $ownerBookings = DB::table("v_bookings_owner")->where('id_clients',$client->id)->get();
        $renterBookings = DB::table("v_bookings_renter")->where('id_clients',$client->id)->get();
        return view('frontend.clients.booking.index')
            ->with('ownerBookings',$ownerBookings)
            ->with('renterBookings',$renterBookings);
    }

    public function requestBooking(Request $request, $idCamper ){
        $searchedDate = $request->searchedDate ?? '';
        if($searchedDate != ''){
            $client = Controller::getConnectedClient();
            $tabDate = explode('-', $searchedDate);
            $startDate = date("Y-m-d",strtotime($tabDate[0]));
            $endDate = date("Y-m-d",strtotime($tabDate[1]));
            $booking = new Booking();
            $booking->start_date = $startDate;
            $booking->end_date = $endDate;
            $booking->id_clients = $client ? $client->id : 0;
            
            $booking->id_campers = $idCamper;
            $booking->id_booking_status = 1;
            $booking->save();

            $camper = Camper::find($idCamper);
            $notification= new Notification();
            $notification->id_renter = $booking->id_clients;
            $notification->id_owner = $camper->id_clients;
            $notification->message="You have new booking for your camper : ".$camper->camper_name ." from : ".$client->client_last_name. " ".$client->client_name;
            $notification->type = "Booking";
            $notification->status = "unread";
            $notification->save();

        }
    }
    public function detailBookingOwner($id){
        $notification = Notification::where('type','Booking')->where('id_table',$id)->first();
        $notification->status="readed";
        $notification->update();
        
        $booking = DB::table("v_bookings_owner")->where('id',$id)->get();
        return view('frontend.clients.booking.detail1')
            ->with('booking',$booking);
    }
}
