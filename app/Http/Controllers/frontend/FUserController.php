<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Avatar;

class FUserController extends Controller
{
    public function __construct()
    {
        if (Controller::getConnectedClient() == null) {
            return view('frontend.login.client');
        }
    }

    public function index()
    {
        $client = Controller::getConnectedClient();
        if ($client->staus == 1) {
            $client_status = 'Confirmed';
        } else {
            $client_status = 'Non Confirmed';
        }
        $profil_birth_date = $client->day_of_birth . '/' . $client->month_of_birth . '.' . $client->year_of_birth;
        $avatars = Avatar::take(3)->get();
        $avatars_second = Avatar::skip(3)->take(3)->get();
        $avatars_third = Avatar::skip(6)->take(3)->get();
        if ($client->type_login == 'forms') {
            return view('frontend.clients.user.index')
                ->with('avatars', $avatars)
                ->with('avatars_second', $avatars_second)
                ->with('avatars_third', $avatars_third)
                ->with('client', $client)
                ->with('profil_birth_date', $profil_birth_date)
                ->with('client_status', $client_status);
        } else {
            return view('frontend.clients.user.index2')
                ->with('avatars', $avatars)
                ->with('avatars_second', $avatars_second)
                ->with('avatars_third', $avatars_third)
                ->with('client', $client)
                ->with('profil_birth_date', $profil_birth_date)
                ->with('client_status', $client_status);
        }
    }
}
