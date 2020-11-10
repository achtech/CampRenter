<?php

namespace App\Http\Controllers\frontend;

use App\Models\Client;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FUserController extends Controller
{
    //
    public function index()
    {
        $clientId = 1; //auth()->user()->id;
        $client = Client::find($clientId);
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.clients.user.index')->with('client', $client)->with('categories', $categories);
    }
}
