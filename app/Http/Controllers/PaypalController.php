<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingExtra;
use App\Models\PaypalStripe;
use DB;
use Illuminate\Http\Request;

class PaypalController extends Controller
{

    public function __construct()
    {

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
        $feePayment = ($_varcost * 3) / 100;
        $total_cost = $_varcost + $feePayment;
        return $total_cost;

    }

    public function savedataPost(Request $request)
    {

        // $logFile = 'laravel.log';

        // Log::useDailyFiles(storage_path() . '/logs/' . $logFile);

        // Log::info("jjjjj");

        PaypalStripe::create([
            "transaction_id" => $request['transaction_id'],
            "amount" => $request['amount'],
            "booking_id" => $request['booking_id'],
            "camper_name" => $request['camper_name'],
            "payer_email" => $request['payer_email'],
            "typepaiement" => $request['typepaiement'],
            "payment_status" => $request['payment_status'],

        ]);
        $saved_booking = Booking::find($request['booking_id']);
        $saved_booking->total = $request['amount'];
        $saved_booking->id_booking_status = 4;
        $saved_booking->update();
        //dd($saved_booking);
        /*$camper = $request['camper_name'];
        $renter = Client::find($request->payer_email);
        $owner = Client::find($request->id_owners);

        Mail::to($renter['email'])->send(new PaymentSuccessRenterMail($renter, $camper));
        Mail::to($owner['email'])->send(new PaymentSuccessOwnerMail($owner, $camper));*/

        /*$payment_amount = $request->amount;
    $myfile = fopen("rece.txt", "w") or die("Unable to open file!");
    $txt = "$payment_amount\n";
    fwrite($myfile, $txt);
    fclose($myfile);*/

    }

    public function successful()
    {
        return view('frontend.clients.booking.payment-successful');

    }

    public function cancelled()
    {
        return view('frontend.clients.booking.payment-cancelled');

    }

    public function payments(Request $request)
    {

        //step : 1
        $booking_id = $request->bookingid;

        $cost = $this->getPricesBooking($booking_id);

        define("LOG_FILE", "ipn.log");
        define("USE_SANDBOX", env('USE_SANDBOX_P'));

        if (USE_SANDBOX == true) {
            $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
            $paypalssl = 'ssl://www.sandbox.paypal.com';
        } else {
            $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
            $paypalssl = 'ssl://www.paypal.com';

        }

        $camper_name = $request->item_name;
        $booking_id = $request->bookingid;
        $payer_email = $request->payer_email;
        $item_amount = $cost;

        $paypal_email = env('Paypal_email');
        $return_url = env('Return_url');
        $cancel_url = env('Cancel_url');
        $notify_url = env('Notify_url');

        if (!isset($request->txn_id) && !isset($request->txn_type)) {

            $querystring = '';

            $querystring .= "?business=" . urlencode($paypal_email) . "&";

            $querystring .= "camper_name=" . urlencode($camper_name) . "&";
            $querystring .= "amount=" . urlencode($item_amount) . "&";
            $querystring .= "payer_email=" . urlencode($payer_email) . "&";
            $querystring .= "booking_id=" . urlencode($booking_id) . "&";

            foreach ($_POST as $key => $value) {
                $value = urlencode(stripslashes($value));
                $querystring .= "$key=$value&";
            }

            $querystring .= "return=" . urlencode(stripslashes($return_url)) . "&";
            $querystring .= "cancel_return=" . urlencode(stripslashes($cancel_url)) . "&";
            $querystring .= "notify_url=" . urlencode($notify_url);

            // Redirect to paypal IPN
            header('location:' . $paypal_url . $querystring);
            exit();

        }
    }

}
