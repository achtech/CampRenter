<?php

namespace App\Http\Controllers\frontend;

use App\models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FC_bookingController extends Controller
{
    //frontend.clients.booking
    public function index()
    {
        return view('frontend.clients.booking.index');
    }

    public function requestBooking(Request $request, $idCamper ){
        $searchedDate = $request->searchedDate ?? '';
        if($searchedDate != ''){
            $tabDate = explode('-', $searchedDate);
            $startDate = date("Y-m-d",strtotime($tabDate[0]));
            $endDate = date("Y-m-d",strtotime($tabDate[1]));
            $client = Controller::getConnectedClient();
            $booking = new Booking();
            $booking->start_date = $startDate;
            $booking->end_date = $endDate;
            $booking->id_clients = $client ? $client->id : 0;
            
            $booking->id_campers = $idCamper;
            $booking->id_booking_status = 1;
            $booking->save();
        }

    }
}
