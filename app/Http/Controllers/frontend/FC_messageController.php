<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Camper;
use App\Models\Chat;
use App\Models\Client;
use App\Models\Notification;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FC_messageController extends Controller
{

    private function getMessages($idClient)
    {

        //get list of users that chats with the current user
        $users = DB::select('select  DISTINCT if(id_owners=?,id_renters,id_owners) AS id from chats where   (id_owners = ? OR id_renters = ?)', [$idClient, $idClient, $idClient]);
        $ids = [];
        foreach ($users as $r) {
            $ids[] = $r->id;
        }
        if (count($ids) > 0) {
            $sql = "select * from v_client_messages where id in (select max(id) from v_client_messages
            where ( renter_id IN (" . implode(',', $ids) . ") and owner_id = " . $idClient . ")
            or  ( owner_id IN (" . implode(',', $ids) . ") and renter_id = " . $idClient .
                ") group by `id_bookings`)";

            $messages = DB::select($sql);

        } else {
            $messages = [];
        }
        return $messages;

    }
    public function index()
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $messages = $this->getMessages($client->id);
        return view('frontend.clients.message.index')->with('messages', $messages)->with('idClient', $client->id);
    }

    public function show($idBookings)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $messages = $this->getMessages($client->id);
        $idClient = $client->id;
        $booking = Booking::where('id', $idBookings)->select('id', 'id_campers', 'id_clients')->first();
        $camper = Camper::where('id', $booking->id_campers)->select('id', 'id_clients')->first();
        $idOwner = $camper->id_clients;
        $idRenter = $booking->id_clients;

        $conversations = DB::table("v_client_messages")
            ->where(function ($query) use ($idRenter, $idOwner) {
                $query->where('renter_id', $idRenter)
                    ->where('owner_id', $idOwner);
            })
            ->orWhere(function ($query) use ($idRenter, $idOwner) {
                $query->where('renter_id', $idOwner)
                    ->where('owner_id', $idRenter);
            })
            ->orderBy('id')->get();

        Notification::where('status', '=', 'unread')
            ->where('type', '=', 'Chats')
            ->where('id_user', '=', $idClient)
            ->update([
                'status' => 'readed',
            ]);

        return view('frontend.clients.message.detail')
            ->with('messages', $messages)
            ->with('conversations', $conversations)
            ->with('activeRenter', $idRenter)
            ->with('activeOwner', $idOwner)
            ->with('idClient', $idClient)
            ->with('id_bookings', $idBookings);

    }

    public function store(Request $request)
    {
        if (Controller::getConnectedClient() == null) {
            return redirect(route('frontend.login.client'));
        }
        $client = Controller::getConnectedClient();
        $input = request()->except(['_token', '_method', 'action']);
        $input['created_by'] = $client->id;
        $input['updated_by'] = $client->id;

        $input['id_owners'] = $request->id_owners;
        $input['id_renters'] = $request->id_renters;

        $input['status'] = "unread";
        $input['sender'] = $client->id == $request->id_renters ? "renter" : "owner";
        $input['date_sent'] = now();
        $input['id_bookings'] = $request->id_bookings;
        $data = Chat::create($input);

        $notification = new Notification();
        $notification->id_user = $request->id_renters;
        $notification->id_table = $data->id;
        if ($request->id_renters != null && $request->id_renters == $client->id) {
            $renter = Client::find($request->id_renters);
            $notification->message = "You have new message from : " . $renter->client_last_name . " " . $renter->client_name;
        }
        if ($request->id_owners != null && $request->id_owners == $client->id) {
            $owner = Client::find($request->id_owners);
            $notification->message = "You have new message from : " . $owner->client_last_name . " " . $owner->client_name;
        }

        $notification->type = "Chats";
        $notification->status = "unread";
        $notification->save();

        return redirect(route('frontend.clients.message.detail', $request->id_bookings));
    }

    public function addMessage($id)
    {
        return redirect('/message_client/detail/' . $id);
    }
    public static function notReadedMessageCount()
    {
        if (Controller::getConnectedClient() == null) {
            return redirect(route('frontend.login.client'));
        }
        $client = Controller::getConnectedClient();
        return DB::table("notifications")->where('type', "Chats")->where('status', "unread")->where('id_user', $client->id)->get()->count();
    }

    public function getBooking($idRenter)
    {
        if (Controller::getConnectedClient() == null) {
            return redirect(route('frontend.login.client'));
        }
        $client = Controller::getConnectedClient();
        $idClient = $client->id;
        $data = DB::table("v_booking_camper")
            ->whereIn('status', [3, 4])
            ->where(function ($query) use ($idRenter, $idClient) {
                $query->whereIn('id_renters', [$idRenter, $idClient])->orWhereIn('id_owners', [$idRenter, $idClient]);
            })->first();
        return $data;
    }

    public function sendInvoice(Request $request)
    {
        if (Controller::getConnectedClient() == null) {
            return redirect(route('frontend.login.client'));
        }
        $GLOBALS['email'] = $request->email;
        $GLOBALS['to_email'] = 'brahim.barjali@gmail.com';
        $subject = "Client : " . $request->client_name . " " . $request->client_last_name . " ; ";
        $subject .= "Reservation N°: " . $request->reservation_num . " ; ";
        $subject .= "Camper name: " . $request->camper_name . ".";
        //$subject .= "Reservation date: " . $request->created_date . ".</br>";
        //$subject .= "Reservation starts and ends on: " . $request->start_date . ", " . $request->end_date . ".</br>";

        $GLOBALS['subject'] = $subject;

        $booking = Booking::find($request->id);
        $booking->id_booking_status = 4;
        $booking->save();

        Mail::raw($request->message, function ($message) {
            $message->from($GLOBALS['email']);
            $message->to($GLOBALS['to_email']);
            $message->subject($GLOBALS['subject']);
        });

        return redirect(route('frontend.clients.booking'));
    }

    public static function getNotificationByRenter($id)
    {
        return Notification::where('id_user', $id)->where('type', 'Chats')->where('status', 'unread')->get()->count();
    }
}
