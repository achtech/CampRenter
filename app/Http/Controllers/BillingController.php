<?php

namespace App\Http\Controllers;



use App\Exports\BillingExport;
use App\Models\Avatars;
use App\Models\Billing;
use App\Models\Client;
use App\Models\Booking;
use App\Models\BillingBookings;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BillingController extends Controller
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

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $todayDate = date("Y-m-d");
        $clients = Client::all();
        $datas = Billing::join('clients', 'billings.id_clients', '=', 'clients.id')
        ->select('Billings.id as id' , 'Billings.id', 'Billings.iban', 'Billings.billings_methods', 'Billings.total', 'Billings.status', 'Billings.payment_date', 'Billings.id_clients','clients.client_name', 'clients.client_last_name')    
        ->get();
        return view('billing.index')
                ->with('datas', $datas)
                ->with('clients', $clients)
                ->with('renter', '')
                ->with('todayDate', $todayDate);
    }

    public function bookings($id)
    {
        $todayDate = date("Y-m-d");
        $datas = DB::table('v_bookings_details')
            ->whereIn('id', function ($query) use ($id) {
                $query->select(['id_bookings'])
                    ->from((new BillingBookings)->getTable())
                    ->where('id_billings', $id);
            })->get();

        $clients = Client::all();
        return view('billing.billing_bookings')
                ->with('datas', $datas)
                ->with('clients', $clients)
                ->with('renter', '')
                ->with('todayDate', $todayDate);
    }
    public function export(Request $request)
    {

        $fileName = 'billings.csv';
        $current_date = date("Y-m-d");
        //$end_date = $request->end_date ?? '';
        $end_date = Session::get('end_date');
        $datas = Billing::join('clients', 'billings.id_clients', '=', 'clients.id')
            ->where('status', '=', 0);
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Owner', 'IBAN', 'Amount');
        $callback = function () use ($datas, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            if ($datas->count() > 0) {
                foreach ($datas as $elem) {
                    $row['Owner']  = $elem->client_name;
                    $row['IBAN']    = $elem->IBAN;
                    $row['Amount']    = $elem->confirmed_amount;
                }
            } else {
                $row['Owner']  = '';
                $row['IBAN']    = '';
                $row['Amount']    = '';
            }
            fputcsv($file, array($row['Owner'], $row['IBAN'], $row['Amount']));
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
        // return Excel::download(new BillingExport, 'billings.xlsx');
    }

    public function filter(Request $request)
    {
        $todayDate = date("Y-m-d");
        $clients = Client::all();
        $startDate = $request->start_date ?? '';
        $end_date = $request->end_date ?? '';
        $status = $request->status ?? '';
        $client = $request->ownerId ??'';
        Session::put('startDate', $startDate);
        Session::put('end_date', $end_date);
        Session::put('status', $status);
        Session::put('client', $client);
        $datas = Billing::join('clients', 'billings.id_clients', '=', 'clients.id');
        if(!empty($startDate)){
            $datas = $datas->whereDate('payment_date', '>=', $startDate);
        }
        if(!empty($endDate)){
            $datas = $datas->whereDate('payment_date', '<=', $endDate);
        }
        if(!empty($status)){
            $datas = $datas->where('billings.status', $status ==2 ? 1 : 0);
        }
        if(!empty($client) && $client!='Choose'){
            $datas = $datas->where('billings.id_clients', $client);
        }
        $datas = $datas->get();
        return view('billing.index')
            ->with('datas', $datas)
            ->with('clients', $clients)
            ->with('status', $status)
            ->with('renter', $client)
            ->with('start_date', $startDate)
            ->with('end_date', $end_date)
            ->with('todayDate', $todayDate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('billing.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('billing.index'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = request()->except(['_token', '_method', 'action']);
        $input['created_by']=auth()->user()->id;
        $input['updated_by']=auth()->user()->id;

        $data = Billing::create($input);
        return redirect(route('billing.index'))->with('success', 'Item added succesfully');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Billing::find($id);
        if (empty($data)) {
            return redirect(route('billing.index'));
        }
        $input = request()->except(['_token', '_method', 'action']);
        $input['updated_by']=auth()->user()->id;
        $data = Billing::where('id', $id)->update($input);
        return redirect(route('billing.index'))->with('success', 'Item Updated succesfully');
    }

    //

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Billing::find($id);
        if (empty($data)) {
            return redirect(route('billing.index'));
        }
        $data->delete();
        return redirect(route('billing.index'));
    }
}
