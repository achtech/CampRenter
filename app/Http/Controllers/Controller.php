<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\Camper;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    static function getMessageCount(){
        return Message::where('status',0)->orderby('send_date')->get()->count();
    }

    
    static function getCampersCount(){
        return Camper::where('is_confirmed',0)->get()->count();
    }

    static function getNotReadedMessages(){
        return Message::where('status',0)->orderby('send_date')->get();
    }

    static function getUser($id){
        $user = User::find($id);
        return $user ? $user->name : '';
    }

    static function getNotConfirmedcampers(){
        return Camper::join('clients', 'clients.id', '=', 'campers.id_clients')
        ->join('camper_names', 'camper_names.id', '=', 'campers.id_camper_names')
        ->where('campers.is_confirmed',0)
        ->select('campers.*', 'camper_names.label_en','camper_names.label_fr','camper_names.label_de', 'clients.client_name', 'clients.client_last_name')
        ->orderby('campers.created_at')
        ->get();
    }
}
