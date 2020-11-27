<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaypalController extends Controller
{

    public function __construct()
    {

    }

    public function LoadProduits()
    {

        return view('paypal.produits');

    }

    public function successful()
    {
        return view('paypal.payment-successful');

    }

    public function cancelled()
    {
        return view('paypal.payment-cancelled');

    }

    public function payments(Request $request)
    {

        define("LOG_FILE", "ipn.log");
        define("USE_SANDBOX", env('USE_SANDBOX_P'));

        if (USE_SANDBOX == true) {
            $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
            $paypalssl = 'ssl://www.sandbox.paypal.com';
        } else {
            $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
            $paypalssl = 'ssl://www.paypal.com';

        }

        $item_name = 'Camera V10';
        $item_amount = 12.00;

        $paypal_email = env('Paypal_email');
        $return_url = env('Return_url');
        $cancel_url = env('Cancel_url');
        $notify_url = env('Notify_url');

        if (!isset($request->txn_id) && !isset($request->txn_type)) {

            $querystring = '';

            $querystring .= "?business=" . urlencode($paypal_email) . "&";

            $querystring .= "item_name=" . urlencode($item_name) . "&";
            $querystring .= "amount=" . urlencode($item_amount) . "&";

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
