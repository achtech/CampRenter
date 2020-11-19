<?php

namespace App\Http\Controllers\frontend;

use App\Models\Notification;
use App\Http\Controllers\Controller;

class FC_notificationController extends Controller
{
    public function index()
    {
        $client = Controller::getConnectedClient();
        $notification  = Notification::where('id_owner',$client->id)->get();
        return view('frontend.clients.notification.index')
                ->with('datas',$notification);
    }

    public function show($id){
        $notification  = Notification::find($id);
        return view('frontend.clients.notification.detail')
                ->with('data',$notification);
    }
}
