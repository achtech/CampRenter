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
        $clientId = 1; //auth()->user()->id;
        $client = Client::find($clientId);
        $avatars = Avatar::get();
        return view('frontend.clients.user.index')
            ->with('avatars', $avatars)
            ->with('client', $client);
    }
}
