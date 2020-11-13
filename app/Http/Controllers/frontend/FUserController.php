<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;

class FUserController extends Controller
{
    //
    public function index()
    {
        $clientId = 1; //auth()->user()->id;
        $client = Client::find($clientId);
        return view('frontend.clients.user.index')->with('client', $client);
    }
}
