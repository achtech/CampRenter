<?php

namespace App\Http\Controllers\frontend;

use DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FC_walletController extends Controller
{
    public function index()
    {
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.clients.wallet.index')->with('categories', $categories);
    }
}
