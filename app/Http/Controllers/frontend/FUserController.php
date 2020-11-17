<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Avatar;
use App\Models\Client;

class FUserController extends Controller
{
    //
    public function index()
    {
        $client = Controller::getConnectedClient();
        if ($client->staus == 1) {
            $client_status = 'Confirmed';
        } else {
            $client_status = 'Non Confirmed';
        }
        $profil_birth_date = $client->day_of_birth . '/' . $client->month_of_birth . '.' . $client->year_of_birth;
        $avatars = Avatar::get();
        return view('frontend.clients.user.index')
            ->with('avatars', $avatars)
            ->with('client', $client)
            ->with('profil_birth_date', $profil_birth_date)
            ->with('client_status', $client_status);
        //->with('client_status', $client_status)

    }
}
