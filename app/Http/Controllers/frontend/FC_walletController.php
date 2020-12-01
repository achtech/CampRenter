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
            $wallet_owner = DB::table("v_wallet_owner")->where('clt', $client->id)->get()->toArray();
            dd($wallet_owner);
            $booking_status = DB::table("booking_status")->where('id', $wallet_owner[0]->bstatus)->get();

            /*$total_canceled
            $total_orders
            $total_confirmed
            $total_rejected*/
            return view('frontend.clients.wallet.index')
                ->with('wallet_owner', $wallet_owner);
        } else {
            return redirect(route('frontend.login.client'));
        }
    }

    public static function walletTotals($id)
    {
        return DB::table("v_bookings_details")->where('owner_id', $id)->sum("total");
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
