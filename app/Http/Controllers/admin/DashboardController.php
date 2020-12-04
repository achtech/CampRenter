<?php

namespace App\Http\Controllers\admin;

use App;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Camper;
use App\Models\Message;
use App\Models\user;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        \Session::put('locale', auth()->user()->lang);
        App::setLocale(auth()->user()->lang);
        $campers = DB::table('campers')->where('is_confirmed', 0)
            ->join('clients', 'campers.id_clients', '=', 'clients.id')
            ->select('campers.id as id', 'campers.camper_name', 'client_name', 'client_last_name')
            ->get();
        $bookings = DB::table('bookings')
            ->join('clients', 'bookings.id_clients', '=', 'clients.id')
            ->select('bookings.id as id', 'bookings.created_at', 'client_name', 'client_last_name')
            ->get();
        $today_owner = $this->getTotal('today', 'owner');
        $week_owner = $this->getTotal('week', 'owner');
        $month_owner = $this->getTotal('month', 'owner');
        $previous_month_owner = $this->getTotal('previous_month', 'owner');

        $today_campunit = $this->getTotal('today', 'campunit');
        $week_campunit = $this->getTotal('week', 'campunit');
        $month_campunit = $this->getTotal('month', 'campunit');
        $previous_month_campunit = $this->getTotal('previous_month', 'campunit');

        $today_total = $today_campunit + $today_owner;
        $week_total = $week_campunit + $week_owner;
        $month_total = $month_campunit + $month_owner;
        $previous_month_total = $previous_month_campunit + $previous_month_owner;
        $messages = Message::where('status', 0)
            ->get();
        return view('admin.dashboard')
            ->with('today_owner', $today_owner)
            ->with('week_owner', $week_owner)
            ->with('month_owner', $month_owner)
            ->with('previous_month_owner', $previous_month_owner)
            ->with('today_campunit', $today_campunit)
            ->with('week_campunit', $week_campunit)
            ->with('month_campunit', $month_campunit)
            ->with('previous_month_campunit', $previous_month_campunit)
            ->with('today_total', $today_total)
            ->with('week_total', $week_total)
            ->with('month_total', $month_total)
            ->with('previous_month_total', $previous_month_total)
            ->with('campers', $campers)
            ->with('bookings', $bookings)
            ->with('messages', $messages);

    }

    public function getTotal($period, $user)
    {
        $today = date("Y-m-d");

        $day = date('w');
        $start_week = date("Y-m-d", strtotime('monday this week'));
        $end_week = date("Y-m-d", strtotime('sunday this week'));
        $start_month = date("Y-m-d", strtotime('first day of this month'));
        $end_month = date("Y-m-d", strtotime('last day of this month'));
        $start_last_month = date("Y-m-d", strtotime('first day of last month'));
        $end_last_month = date("Y-m-d", strtotime('last day of last month'));
        $startDate = $period == 'today' ? $today : ($period == 'week' ? $start_week : ($period == 'month' ? $start_month : $start_last_month));
        $end_date = $period == 'today' ? $today : ($period == 'week' ? $end_week : ($period == 'month' ? $end_month : $end_last_month));
        $owner = $user == 'owner';
        return self::getIncome($startDate, $end_date, $owner);
    }

    public static function getIncome($startDate, $end_date, $owner)
    {
        /* $data = Booking::where('start_date','<=',$owner?$end_date:$startDate)
        ->where('end_date','>=',$owner?$end_date:$startDate);
         */
        $data = '';
        if ($owner) {
            $data = Booking::select(DB::raw('sum((total/100) * (100-commission)) as total'))
                ->whereDate('end_date', '>=', $startDate)
                ->whereDate('end_date', '<=', $end_date);
        } else {
            $data = Booking::select(DB::raw('sum((total/100) * commission) as total'))
                ->whereDate('start_date', '>=', $startDate)
                ->whereDate('start_date', '<=', $end_date);
        }
        $data = $data->first(['total']);
        return $data->total;
    }

    public function confirmCamper($id)
    {
        $data = Camper::find($id);
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
        return view('admin.dashboard')->with('datas', $bookings);
    }
}
