<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Controller;
use App\Models\Promotion;
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

            $owner_bookings = DB::table("v_bookings_owner")->where('id_owners', $client->id)->get();
            $activePromotion = Promotion::where('status', 1)->first();
            $billings = DB::table("billings")->where('id_clients', $client->id)->get();
            //dd($activePromotion);
            return view('frontend.clients.wallet.index')
                ->with('total_canceled', $total_canceled)
                ->with('total_confirmed', $total_confirmed)
                ->with('total_rejected', $total_rejected)
                ->with('total_orders', $total_orders)
                ->with('owner_bookings', $owner_bookings)
                ->with('activePromotion', $activePromotion)
                ->with('billings', $billings)
                ->with('client', $client);
        } else {
            return redirect(route('frontend.login.client'));
        }
    }

    public static function getIncomBooking($id)
    {
        $booking = DB::table("v_bookings_owner")->where('id', $id)->first();
        $getIncome = DashboardController::getIncome($booking->start_date, $booking->end_date, $booking->id_owners);
        return $getIncome;

    }
}
