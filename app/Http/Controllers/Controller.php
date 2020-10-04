<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\Equipment;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    static function getMessageCount(){
        return Message::where('status',0)->orderby('date_time')->get()->count();
    }

    
    static function getCampersCount(){
        return Equipment::where('is_confirmed',0)->get()->count();
    }

    static function getNotReadedMessages(){
        return Message::where('status',0)->orderby('date_time')->get();
    }

    static function getNotConfirmedEquipments(){
        return Equipment::join('clients', 'clients.id', '=', 'Equipments.id_client')
        ->join('camper_names', 'camper_names.id', '=', 'Equipments.id_campers_name')
        ->where('Equipments.is_confirmed',0)
        ->select('Equipments.*', 'camper_names.label_en','camper_names.label_fr','camper_names.label_de', 'clients.client_name', 'clients.client_last_name')
        ->orderby('Equipments.created_at')
        ->get();
    }
}
