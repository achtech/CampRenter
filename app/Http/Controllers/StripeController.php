<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BookingExtra;
use App\Models\CamperTerms;
use App\Models\PaypalStripe;
use DB;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeController extends Controller
{
    /**
     * payment view
     */
    public function handleGet()
    {
        // redirect(route('frontend.clients.booking'));
        echo 'ex';
    }

    /**
     * handling payment with POST
     */
    private function getBookingWithoutInsurance($id, $start_date, $end_date)
    {

        $sMonth = date('m', strtotime($start_date));
        $eMonth = date('m', strtotime($end_date));
        $total = 0;
        $sameSaison = ($sMonth == 5 && $eMonth == 6) || ($sMonth == 7 && $eMonth == 8) || ($sMonth == 9 && $eMonth == 10)
            || ($sMonth == 11 && $eMonth == 12) || ($sMonth == 12 && $eMonth == 1) || ($sMonth <= 4 && $eMonth <= 4);
        if ($sMonth == $eMonth || $sameSaison) {
            $nbrDays = Controller::diffDate($start_date, $end_date);
            $sMonth = $sMonth == 9 ? 5 : ($sMonth == 10 ? 5 : $sMonth);
            $eMonth = $eMonth == 9 ? 6 : ($eMonth == 10 ? 6 : $eMonth);
            $sMonth = $sMonth == 12 || $sMonth <= 4 ? 11 : $sMonth;
            $eMonth = $eMonth == 12 || $eMonth <= 4 ? 4 : $eMonth;
            $pricePerDay = CamperTerms::where('id_campers', $id)
                ->where(function ($query) use ($sMonth) {
                    $query->where('start_month', $sMonth)
                        ->orWhere('end_month', $sMonth);
                })
                ->first();
            $total = ($pricePerDay ? $pricePerDay->price_per_night : 0) * $nbrDays;
        } else {
            $nbrDays1 = Controller::diffDate($start_date, date("Y-m-t", strtotime($start_date)));
            $nbrDays2 = Controller::diffDate(date("Y-m-01", strtotime($end_date)), $end_date);
            $sMonth = $sMonth == 9 ? 5 : ($sMonth == 10 ? 5 : $sMonth);
            $eMonth = $eMonth == 9 ? 6 : ($eMonth == 10 ? 6 : $eMonth);

            $pricePerDay1 = CamperTerms::where('id_campers', $id)
                ->where(function ($query) use ($sMonth) {
                    $query->where('start_month', $sMonth)
                        ->orWhere('end_month', $sMonth);
                })
                ->first()->price_per_night;

            $pricePerDay2 = CamperTerms::where('id_campers', $id)
                ->where(function ($query) use ($eMonth) {
                    $query->where('start_month', $eMonth)
                        ->orWhere('end_month', $eMonth);
                })
                ->first()->price_per_night;

            $total = ($pricePerDay1 ? $pricePerDay1->price_per_night : 0) * ($nbrDays1 + 1) + ($pricePerDay2 ? $pricePerDay2->price_per_night : 0) * $nbrDays2;
        }
        return $total;
    }

    public static function getExtraBooking($id)
    {
        return BookingExtra::join('insurance_extra', 'insurance_extra.id', '=', 'booking_extras.id_insurance_extra')->where('id_bookings', $id)->get();
    }

    public function getPricesBooking($booking_id)
    {
        $booking = DB::table("v_bookings_owner")->where('id', $booking_id)->first();

        $total_without_insurance = $this->getBookingWithoutInsurance($booking->id_campers, $booking->start_date, $booking->end_date);

        $totalExtra = 0;
        $bookingExtras = $this->getExtraBooking($booking->id);
        foreach ($bookingExtras as $be) {

            $totalExtra += $be->price;
        }

        $_varcost = $total_without_insurance + $booking->insurance_price + $totalExtra;
        return $_varcost;

    }
    public function handlePost(Request $request)
    {
        $booking_id = $request->bookingid;

        $cost = $this->getPricesBooking($booking_id);

        PaypalStripe::create([
            "transaction_id" => uniqid(),
            "amount" => $cost,
            "booking_id" => $booking_id,
            "camper_name" => $request['item_name'],
            "payer_email" => $request->payer_email,
            "typepaiement" => "stripe",
            "payment_status" => "success",

        ]);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 100 * $cost,
            "currency" => "chf",
            "source" => $request->stripeToken,
            "description" => "Making test payment.",
        ]);

        Session::flash('successStripe', 'Payment has been successfully processed.');

        return back();
    }
}
