<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\OwnerConfirmationMail;
use App\Mail\OwnerRejectMail;
use App\Mail\OwnerRequestMail;
use App\Mail\RenterConfirmationMail;
use App\Mail\RenterRejectMail;
use App\Mail\RenterRequestMail;
use App\Models\Booking;
use App\Models\BookingExtra;
use App\Models\Camper;
use App\Models\Client;
use App\Models\Insurance;
use App\Models\InsuranceExtra;
use App\Models\Notification;
use App\Models\Promotion;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FC_bookingController extends Controller
{

    //frontend.clients.booking
    public function index()
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $ownerBookings = DB::table("v_bookings_owner")->where('id_owners', $client->id)->orderBy('id', 'desc')->get();
        $renterBookings = DB::table("v_bookings_owner")->where('booking_status_id', '<>', 7)->where('id_renters', $client->id)->orderBy('id', 'desc')->get();
        foreach ($renterBookings as $booking) {
            $bookingWithoutInsurance = Controller::getBookingWithoutInsurance($booking->id_campers, $booking->start_date, $booking->end_date);
            $totalExtra = 0;
            $bookingExtras = $this->getExtraBooking($booking->id);
            foreach ($bookingExtras as $be) {
                $totalExtra += $be->price;
            }
            $booking->total = $bookingWithoutInsurance + $totalExtra + $booking->insurance_price;
        }
        foreach ($ownerBookings as $booking) {
            $bookingWithoutInsurance = Controller::getBookingWithoutInsurance($booking->id_campers, $booking->start_date, $booking->end_date);
            $totalExtra = 0;
            $bookingExtras = $this->getExtraBooking($booking->id);
            foreach ($bookingExtras as $be) {
                $totalExtra += $be->price;
            }
            $booking->total = $bookingWithoutInsurance + $totalExtra + $booking->insurance_price;
        }
        return view('frontend.clients.booking.index')
            ->with('ownerBookings', $ownerBookings)
            ->with('renterBookings', $renterBookings);
    }

    public function requestBooking(Request $request)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $searchedDate = $request->searchedDate ?? '';
        if ($searchedDate != '') {
            $camper = Camper::find($request->id_campers);
            $tabDate = explode('-', $searchedDate);
            $startDate = date("Y-m-d", strtotime($tabDate[0]));
            $endDate = date("Y-m-d", strtotime($tabDate[1]));
            $booking = new Booking();
            $booking->start_date = $startDate;
            $booking->end_date = $endDate;
            $booking->id_clients = $client ? $client->id : 0;

            $booking->id_campers = $request->id_campers;
            $booking->id_booking_status = 1;
            $booking->status_billings = 'Not paid';
            $booking->commission = Promotion::where('status', 1)->first()->commission;

            $total = Controller::getBookingWithoutInsurance($request->id_campers, $startDate, $endDate);
            $booking->total = $total;
            $booking->total_camper = $total;

            $booking->save();

            $notification = new Notification();
            $notification->id_user = $booking->id_clients;
            $notification->id_table = $booking->id;
            $notification->message = "You request for booking camper : " . $camper->camper_name . " has been sent.";
            $notification->type = "Booking";
            $notification->status = "unread";
            $notification->save();

            $notification = new Notification();
            $notification->id_user = $camper->id_clients;
            $notification->id_table = $booking->id;
            $notification->message = "You have new booking for your camper : " . $camper->camper_name . " from : " . $client->client_last_name . " " . $client->client_name;
            $notification->type = "Booking";
            $notification->status = "unread";
            $notification->save();

            $owner = Client::find($camper->id_clients);
            Mail::to($client['email'])->send(new RenterRequestMail($client, $camper));
            Mail::to($owner['email'])->send(new OwnerRequestMail($owner, $camper));
        }
    }

    public function detailBookingOwner($id)
    {
        $n = Notification::where('type', 'Booking')->where('id_table', $id)->first();
        if ($n) {
            $notification = Notification::find($n->id);
            if ($notification) {
                $notification->status = "readed";
                $notification->update();
            }
        }

        $booking = DB::table("v_bookings_owner")->where('id', $id)->first();
        return view('frontend.clients.booking.detail1')
            ->with('booking', $booking);
    }

    public function confirmBookingOwner($id)
    {
        $booking = Booking::find($id);
        $booking->id_booking_status = 2;
        $booking->save();

        $camper = Camper::find($booking->id_campers);
        $notification = new Notification();
        $notification->id_user = $booking->id_clients;
        $notification->id_table = $booking->id;
        $notification->message = "Your request for camper " . $camper->camper_name . " between  : " . date("j F Y", strtotime($booking->start_date)) . " and " . date("j F Y", strtotime($booking->end_date)) . " is CONFIRMED";
        $notification->type = "Booking";
        $notification->status = "unread";
        $notification->save();

        $notification = new Notification();
        $notification->id_user = $camper->id_clients;
        $notification->id_table = $booking->id;
        $notification->message = "You confirmed the booking of  camper " . $camper->camper_name . " between  : " . date("j F Y", strtotime($booking->start_date)) . " and " . date("j F Y", strtotime($booking->end_date));
        $notification->type = "Booking";
        $notification->status = "unread";
        $notification->save();

        $renter = Client::find($booking->id_clients);
        $owner = Client::find($camper->id_clients);

        Mail::to($renter['email'])->send(new RenterConfirmationMail($renter, $camper));
        Mail::to($owner['email'])->send(new OwnerConfirmationMail($owner, $camper));

        return redirect(route('frontend.clients.booking'));
    }

    public function rejectBookingOwner($id)
    {
        $booking = Booking::find($id);
        $booking->id_booking_status = 3;
        $booking->save();

        $camper = Camper::find($booking->id_campers);
        $notification = new Notification();
        $notification->id_user = $booking->id_clients;
        $notification->id_table = $booking->id;
        $notification->message = "Your request for camper " . $camper->camper_name . " between  : " . date("j F Y", strtotime($booking->start_date)) . " and " . date("j F Y", strtotime($booking->end_date)) . " is REJECTED";
        $notification->type = "Booking";
        $notification->status = "unread";
        $notification->save();

        $notification = new Notification();
        $notification->id_user = $camper->id_clients;
        $notification->id_table = $booking->id;
        $notification->message = "You reject a booking for camper: " . $camper->camper_name . " between  : " . date("j F Y", strtotime($booking->start_date)) . " and " . date("j F Y", strtotime($booking->end_date));
        $notification->type = "Booking";
        $notification->status = "unread";
        $notification->save();

        $renter = Client::find($booking->id_clients);
        $owner = Client::find($camper->id_clients);

        Mail::to($renter['email'])->send(new RenterRejectMail($renter, $camper));
        Mail::to($owner['email'])->send(new OwnerRejectMail($owner, $camper));

        return redirect(route('frontend.clients.booking'));
    }

    public function processBookingRenter($id)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        //dd($id);
        $booking = DB::table("v_bookings_owner")->where('id', $id)->first();
        $camper = Camper::find($booking->id_campers);
        $t = $camper->allowed_total_weight > 3.5 ? ">3" : "<=3";
        $hasTonz = Insurance::where('id_camper_categories', $camper->id_camper_categories)->first();
        $tons = $hasTonz->tonage != null ? $t : 0;
        $insurance_total = Controller::getInsurance($camper->id_camper_categories, $booking->nbr_days, $tons);
        //save included insurance in booking
        if ($camper->has_insurance) {
            $this->changeInsurance($id);
        }

        $insurance = Insurance::where('id_camper_categories', $camper->id_camper_categories)
            ->where('nbr_days_from', "<=", $booking->nbr_days)
            ->where('nbr_days_To', ">=", $booking->nbr_days);
        $insurance = $tons == 0 ? $insurance->first() : $insurance->where('tonage', $tons)->first();

        if ($insurance == null) {
            $insurance = Insurance::where('id_camper_categories', $camper->id_camper_categories)->whereNull('nbr_days_To');
            $insurance = $tons == 0 ? $insurance->first() : $insurance->where('tonage', $tons)->first();
        }

        $extras = DB::table('insurance_extra')
            ->select('name')
            ->groupBy('name')
            ->get();

        $camper_extra = DB::table('camper_insurances')->join('insurance_extra', 'insurance_extra.id', '=', 'camper_insurances.id_insurance_extra')->where('id_campers', $camper->id)->select('name')->get()->toArray();
        $extraIds = [];
        $totalExtra = 0;
        foreach ($camper_extra as $item) {
            $extraIds[] = $item->name;
            $totalExtra += Controller::getExtraInsurance($item->name, $booking->nbr_days);
            //save extra in booking extra
            $this->addExtra($id, $item->name);

        }
        $html = $this->getHtmlPricesBooking($booking->id);

        return view('frontend.clients.booking.booking_paiement')
            ->with('client', $client)
            ->with('booking', $booking)
            ->with('insurance_total', $insurance_total)
            ->with('insurance', $insurance)
            ->with('camper', $camper)
            ->with('extras', $extras)
            ->with('extraIds', $extraIds)
            ->with('html', $html);
    }

    public function changeInsurance($id_booking)
    {
        $booking = DB::table("v_bookings_owner")->where('id', $id_booking)->first();
        $camper = Camper::find($booking->id_campers);
        $t = $camper->allowed_total_weight > 3.5 ? ">3" : "<=3";
        $hasTonz = Insurance::where('id_camper_categories', $camper->id_camper_categories)->first();
        $tons = $hasTonz->tonage != null ? $t : 0;
        $insurance_total = Controller::getInsurance($camper->id_camper_categories, $booking->nbr_days, $tons);

        $b = Booking::find($id_booking);
        $b->insurance_price = $insurance_total;
        $b->save();
        return $this->getHtmlPricesBooking($id_booking);

    }

    public function removeInsuranceFromBooking($id)
    {
        $b = Booking::find($id);
        $b->insurance_price = 0;
        $b->update();
        return $this->getHtmlPricesBooking($id);
    }

    public function addExtra($id_booking, $extraName)
    {
        $this->removeExtra($id_booking, $extraName);
        $extra = InsuranceExtra::where('name', $extraName)->first();
        $booking = DB::table('v_bookings_owner')->where('id', $id_booking)->first();
        $newData = BookingExtra::create([
            'id_bookings' => $id_booking,
            'id_insurance_extra' => $extra->id,
            'price' => Controller::getExtraInsurance($extra->name, $booking->nbr_days),
        ]);
        $newData->save();
        return $this->getHtmlPricesBooking($id_booking);
    }

    public function removeExtra($id_booking, $extraName)
    {
        $extra = InsuranceExtra::where('name', $extraName)->get();
        $ids = '';
        foreach ($extra as $ext) {
            $ids .= $ext->id . ',';
        }
        $ids = rtrim($ids, ',');
        DB::statement('DELETE FROM booking_extras WHERE id_bookings =' . $id_booking . " and id_insurance_extra in (" . $ids . ")");
        return $this->getHtmlPricesBooking($id_booking);
    }

    public function addSubExtra($id_booking, $extraName, $subExtra)
    {
        $this->removeExtra($id_booking, $extraName);
        $extra = InsuranceExtra::where('name', $extraName)->where('sub_extra', $subExtra)->first();
        $booking = DB::table('v_bookings_owner')->where('id', $id_booking)->first();
        $newData = BookingExtra::create([
            'id_bookings' => $id_booking,
            'id_insurance_extra' => $extra->id,
            'price' => Controller::getSubExtraInsurance($extra->name, $subExtra, $booking->nbr_days),
        ]);
        $newData->save();
        return $this->getHtmlPricesBooking($id_booking);

    }

    public function removeSubExtra($id_booking, $extraName, $subExtra)
    {
        $extra = InsuranceExtra::where('name', $extraName)->where('sub_extra', $subExtra)->first();
        DB::statement('DELETE FROM booking_extras WHERE id_bookings =' . $id_booking . " and id_insurance_extra=" . $extra->id);
        return $this->getHtmlPricesBooking($id_booking);
    }

    public static function getExtraBooking($id)
    {
        return BookingExtra::join('insurance_extra', 'insurance_extra.id', '=', 'booking_extras.id_insurance_extra')->where('id_bookings', $id)->get();
    }

    public function getHtmlPricesBooking($booking_id)
    {
        $booking = DB::table("v_bookings_owner")->where('id', $booking_id)->first();

        $total_without_insurance = Controller::getBookingWithoutInsurance($booking->id_campers, $booking->start_date, $booking->end_date);
        $html = "<li>" . trans('front.date') . " <span>" . date('j F Y', strtotime($booking->created_date)) . "</span></li>";

        $html .= "<li>" . trans('front.n_nights') . " <span>" . $booking->nbr_days . " " . trans('front.nights') . "</span></li>";
        $html .= "<li>Price <span>" . $total_without_insurance . " CHF</span></li>";

        if ($booking->insurance_price != 0) {
            $html .= "<li>Insurance  <span>" . $booking->insurance_price . " CHF</span></li>";
        }
        $totalExtra = 0;
        $bookingExtras = $this->getExtraBooking($booking->id);
        foreach ($bookingExtras as $be) {
            $html .= "<li>" . $be->name . " <span>" . $be->price . " CHF</span></li>";
            $totalExtra += $be->price;
        }
        $html .= "<li class='total-costs'>" . trans('front.total_cost') . " <span>" . ($total_without_insurance + $booking->insurance_price + $totalExtra) . " CHF</span></li>";
        return $html;
    }

    public static function canBook($camper)
    {
        $connectedClient = Controller::getConnectedClient();
        $check1 = $connectedClient != null && $camper->id_clients != $connectedClient->id;
        return $check1;
    }
    public static function isNotBooked($id)
    {
        $connectedClient = Controller::getConnectedClient();
        if ($connectedClient) {
            $check2 = Booking::where('id_campers', $id)->where('id_clients', $connectedClient->id)->where('id_booking_status', 1)->get()->count();
            return $check2 != 0;
        }

    }

}
