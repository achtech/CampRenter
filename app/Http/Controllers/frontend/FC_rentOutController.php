<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Camper;
use App\Models\Client;
use Illuminate\Http\Request;

class FC_rentOutController extends Controller
{
    public function __construct()
    {
        if (Controller::getConnectedClient() == null) {
            return view('frontend.login.client');
        }
    }

    public function storePersonnalData(Request $request)
    {
        $camper = new Camper();
        $camper->id_camper_categories = $request->id_camper_categories;
        $camper->camper_name = $request->camper_name;
        $camper->description = $request->description;
        return view('frontend.camper.rent_out.personnal_data')->with('camper', $camper);
    }

    public function storeCamperProfile(Request $request)
    {
        $camper = $request->camper ?? new Camper();
        $client = new Client();
        return view('frontend.camper.rent_out.personnal_data')
            ->with('camper', $camper)
            ->with('client', $client);
    }
}
