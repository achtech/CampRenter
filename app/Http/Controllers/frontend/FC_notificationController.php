<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use DB;

class FC_notificationController extends Controller
{

    public function index()
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $notification = Notification::where('id_user', $client->id)->orderBy('created_at', 'DESC')->get();
        return view('frontend.clients.notification.index')
            ->with('datas', $notification);
    }

    public function show($id)
    {
        if (Controller::getConnectedClient() == null) {
            return redirect(route('frontend.login.client'));
        }
        $n = Notification::find($id);
        $n->status = "readed";
        $n->update();
        $booking = DB::table("v_bookings_owner")->where('id', $n->id_table)->first();

        return view('frontend.clients.booking.detail1')
            ->with('booking', $booking);
    }
}
