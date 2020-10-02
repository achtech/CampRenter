<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Equipment;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = Equipment::where('is_confirmed', 0)
            ->join('clients', 'equipments.id_client', '=', 'clients.id')
            ->join('camper_names', 'equipments.id_campers_name', '=', 'camper_names.id')
            ->get();
        $bookings = Booking::join('clients', 'bookings.id_clients', '=', 'clients.id')
            ->get();
        $messages = Message::join('clients', 'messages.id_client', '=', 'clients.id')
            ->get();
        return view('dashboard')->with('datas', $datas)->with('bookings', $bookings)->with('messages', $messages);
    }
    public function confirmEquipment($id)
    {
        $data = Equipment::find($id);
        if (empty($data)) {
            return redirect(route('dashboard'));
        }
        $data->is_confirmed = 1;
        $data->save();
        return redirect(route('dashboard'));
    }
    public function getLastBookings()
    {
        $bookings = Booking::join('clients', 'bookings.id_clients', '=', 'clients.id')
            ->get();
        return view('dashboard')->with('datas', $bookings);
    }
}
