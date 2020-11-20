<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function callback($service, Request $request, Client $client)
    {
        $_serv = $service;
        $user = Socialite::driver($service)->stateless()->user();

        $str = explode(" ", $user['name']);
        $client->client_name = $str[0];
        $client->client_last_name = $str[1];
        $client->email = $user['email'];
        $client->password = bcrypt($this->generateRandomString());
        $checkByEmail = Client::where('email', $user['email'])->get()->count();
        if ($_serv == "facebook") {
            if ($checkByEmail == 0) { // compte vide
                $client->type_login = "facebook";
                $client->save();
                Session::put('_client', $user['email']);
                return redirect('/');

            } else {
                Session::put('_client', $user['email']);
                return redirect('/');
            }

        } else {
            if ($checkByEmail == 0) { // compte vide
                $client->type_login = "google";
                $client->save();
                Session::put('_client', $user['email']);
                return redirect('/');

            } else {
                Session::put('_client', $user['email']);
                return redirect('/');
            }
        }

    }

}
