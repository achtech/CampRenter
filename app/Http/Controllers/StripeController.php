<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\PaymentSuccessOwnerMail;
use App\Mail\PaymentSuccessRenterMail;
use App\Models\Booking;
use App\Models\BookingExtra;
use App\Models\Client;
use App\Models\PaypalStripe;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    public static function getExtraBooking($id)
    {
        return BookingExtra::join('insurance_extra', 'insurance_extra.id', '=', 'booking_extras.id_insurance_extra')->where('id_bookings', $id)->get();
    }

    public function getPricesBooking($booking_id)
    {
        $booking = DB::table("v_bookings_owner")->where('id', $booking_id)->first();

        $total_without_insurance = Controller::getBookingWithoutInsurance($booking->id_campers, $booking->start_date, $booking->end_date);

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

        $saved_booking = Booking::find($booking_id);
        $saved_booking->total = $request['amount'];
        $saved_booking->id_booking_status = 4;
        $saved_booking->update();
        $camper = $request['camper_name'];
        $renter = Client::where('email', $request->payer_email)->first();
        $owner = Client::find($request->id_owners);

        Mail::to($renter['email'])->send(new PaymentSuccessRenterMail($renter, $camper));
        Mail::to($owner['email'])->send(new PaymentSuccessOwnerMail($owner, $camper));

        return back();
    }
}
