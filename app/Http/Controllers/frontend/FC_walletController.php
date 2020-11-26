<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class FC_walletController extends Controller
{
    public function index()
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.clients.wallet.index'));
        }
        return view('frontend.clients.wallet.index');
    }
}
