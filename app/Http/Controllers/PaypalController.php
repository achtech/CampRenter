<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BookingExtra;
use App\Models\CamperTerms;
use App\Models\PaypalStripe;
use DB;
use Illuminate\Http\Request;

class PaypalController extends Controller
{

    public function __construct()
    {

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

        $payment_amount = $request->amount;

        $myfile = fopen("rece.txt", "w") or die("Unable to open file!");

        $txt = "$payment_amount\n";

        fwrite($myfile, $txt);

        fclose($myfile);

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
