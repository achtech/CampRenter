<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use DB;
class FC_messageController extends Controller
{

    public function index()
    {
        $client = Controller::getConnectedClient();
        $messages = DB::table("view_client_messages")->where('id_owner', $client->id)->get();
        return view('frontend.clients.message.index')->with('messages',$messages);
    }

    public function show($idRenter)
    {
        $messages = DB::table("client_messages")->where('id_renter', $idRenter)->get();
        return view('frontend.clients.message.detail')->with('messages',$messages);
    }

    public  static function notReadedMessageCount(){
        $client = Controller::getConnectedClient();
        return DB::table("client_messages")->where('id_owner', $client->id)->get()->count();
    }
}
