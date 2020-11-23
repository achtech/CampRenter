<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class FC_notificationController extends Controller
{

    public function index()
    {
        if (Controller::getConnectedClient() == null) {
            return redirect(route('frontend.login.client'));
        }
        $client = Controller::getConnectedClient();
        $notification = Notification::where('id_owner', $client->id)->get();
        return view('frontend.clients.notification.index')
            ->with('datas', $notification);
    }

    public function show($id)
    {
        $notification = Notification::find($id);
        return view('frontend.clients.notification.detail')
            ->with('data', $notification);
    }
}
