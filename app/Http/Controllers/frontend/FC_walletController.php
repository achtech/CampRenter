<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class FC_walletController extends Controller
{
    public function __construct()
    {
        if (Controller::getConnectedClient() == null) {
            return view('frontend.login.client');
        }
    }

    public function index()
    {
        return view('frontend.clients.wallet.index');
    }
}
