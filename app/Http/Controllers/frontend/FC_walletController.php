<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;

class FC_walletController extends Controller
{
    public function index()
    {
        $client = Controller::getConnectedClient();
        if ($client != null) {
            $wallet_owner = DB::table("v_wallet_owner")->where('clt', $client->id);

            $total_canceled = DB::table("v_wallet_owner")->where('clt', $client->id)->where('bstatus', 6)->first();
            $total_confirmed = DB::table("v_wallet_owner")->where('clt', $client->id)->where('bstatus', 2)->first();
            $total_rejected = DB::table("v_wallet_owner")->where('clt', $client->id)->where('bstatus', 3)->first();

            $total_orders = DB::table("v_wallet_owner")->where('clt', $client->id)->sum('total');

            return view('frontend.clients.wallet.index')
                ->with('total_canceled', $total_canceled)
                ->with('total_confirmed', $total_confirmed)
                ->with('total_rejected', $total_rejected)
                ->with('total_orders', $total_orders)
                ->with('client', $client);
        } else {
            return redirect(route('frontend.login.client'));
        }
    }

    public static function walletTotals($id)
    {
        $client = Controller::getConnectedClient();
        if ($client != null) {
            return DB::table("v_bookings_details")->where('owner_id', $id)->sum("total");
        }
    }

    public static function walletCurrentMonth($id)
    {
        return DB::table("v_bookings_details")
            ->where('owner_id', $id)
            ->where('start_date', Carbon::now()->month)
            ->where('end_date', Carbon::now()->month)
            ->sum("total");
    }
}
