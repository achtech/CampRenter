<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Equipment;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = Equipment::where('is_confirmed', 0)
            ->join('clients', 'equipments.id_client', '=', 'clients.id')
            ->get();
        $bookings = Booking::join('clients', 'bookings.id_clients', '=', 'clients.id')
            ->get();
        return view('dashboard')->with('datas', $datas)->with('bookings', $bookings);
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
