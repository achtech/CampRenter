<?php

namespace App\Http\Controllers;

use App\Models\Camper;
use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getMessageCount()
    {
        return Message::where('status', 0)->orderby('send_date')->get()->count();
    }

    public static function getCampersCount()
    {
        return Camper::where('is_confirmed', 0)->get()->count();
    }

    public static function getNotReadedMessages()
    {
        return Message::where('status', 0)->orderby('send_date')->get();
    }

    public static function getUser($id)
    {
        $user = User::find($id);
        return $user ? $user->name : '';
    }

    public static function getNotConfirmedcampers()
    {
        return Camper::join('clients', 'clients.id', '=', 'campers.id_clients')
            ->where('campers.is_confirmed', 0)
            ->select('campers.*', 'clients.client_name', 'clients.client_last_name')
            ->orderby('campers.created_at')
            ->get();
    }
}
