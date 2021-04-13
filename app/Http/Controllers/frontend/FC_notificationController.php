<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Notification;

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
        if ($n->type == "Booking") {
            return redirect(route('booking.owner_booking.detail', $n->id_table));
        }
        if ($n->type == "Chats") {
            return redirect(route('frontend.clients.message.detail', $n->id_table));
        }

    }

    public function destroy(Request $request)
    {
        $data = Notification::find($request->id);
        if (empty($data)) {
            return redirect(route('notification.index'));
        }
        $data->delete();
        return redirect(route('notification.index'));
    }
}
