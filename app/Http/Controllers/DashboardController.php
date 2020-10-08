<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Camper;
use App\Models\Message;
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
        $datas = Camper::where('is_confirmed', 0)
            ->join('clients', 'campers.id_clients', '=', 'clients.id')
            ->join('camper_names', 'campers.id_camper_names', '=', 'camper_names.id')
            ->get();
        $bookings = Booking::join('clients', 'bookings.id_clients', '=', 'clients.id')
            ->get();
        $today_owner = $this->getTotal('today','owner');
        $week_owner = $this->getTotal('week','owner');
        $month_owner = $this->getTotal('month','owner');
        $previous_month_owner = $this->getTotal('previous_month','owner');

        $today_campunit = $this->getTotal('today','campunit');
        $week_campunit = $this->getTotal('week','campunit');
        $month_campunit = $this->getTotal('month','campunit');
        $previous_month_campunit = $this->getTotal('previous_month','campunit');

        $today_total = $today_campunit+$today_owner;
        $week_total = $week_campunit+$week_owner;
        $month_total = $month_campunit+$month_owner;
        $previous_month_total = $previous_month_campunit+$previous_month_owner;
 		$messages = Message::where('status',0)
            ->get();
        return view('dashboard')
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
            ->with('datas', $datas)
            ->with('bookings', $bookings)
			->with('messages', $messages);
       
        
    }

    public function getTotal($period,$user){
        $today = date("Y-m-d");
        
        $day = date('w');
        $start_week = date("Y-m-d", strtotime('monday this week'));
        $end_week = date("Y-m-d", strtotime('sunday this week'));
        $start_month = date("Y-m-d", strtotime('first day of this month'));
        $end_month = date("Y-m-d", strtotime('last day of this month'));
        $start_last_month = date("Y-m-d", strtotime('first day of last month'));;
        $end_last_month = date("Y-m-d", strtotime('last day of last month'));;
        $startDate = $period == 'today' ? $today : ($period == 'week' ? $start_week : ($period == 'month' ? $start_month : $start_last_month));
        $end_date = $period == 'today' ? $today : ($period == 'week' ? $end_week : ($period == 'month' ? $end_month : $end_last_month));
        $owner = $user == 'owner';
        return $this->getIncome($startDate,$end_date,$owner);
    }

    public function getIncome($startDate,$end_date,$owner){
       /* $data = Booking::where('start_date','<=',$owner?$end_date:$startDate)
                       ->where('end_date','>=',$owner?$end_date:$startDate);
         */
        $data=Booking::leftjoin('commissions', 'Bookings.id_commissions', '=', 'commissions.id')
        ->leftjoin('Promotions', 'Promotions.id', '=', 'Bookings.id_promotions');
        if($owner){
            $data = $data->select(DB::raw('sum((Bookings.total/100) * (100-(IFNULL(Commissions.rate,0)+ IFNULL(Promotions.commission,0)))) as total'))
                        ->where('Bookings.end_date','>=',$startDate)
                        ->where('Bookings.end_date','<=',$end_date);
        } else {
            $data = $data->select(DB::raw('sum((Bookings.total/100) * (IFNULL(Commissions.rate,0)+ IFNULL(Promotions.commission,0))) as total'))
                            ->where('Bookings.start_date','>=',$startDate)
                           ->where('Bookings.start_date','<=',$end_date);
        }
        
        $data= $data->first(['total']);
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
        return view('dashboard')->with('datas', $bookings);
    }
}
