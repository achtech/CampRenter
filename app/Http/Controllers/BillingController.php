<?php

namespace App\Http\Controllers;



use App\Exports\BillingExport;
use App\Models\Avatars;
use App\Models\Billing;
use App\Models\Booking;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $todayDate = date("Y-m-d");
        $datas = Billing::join('clients', 'billings.id_clients', '=', 'clients.id')
            ->get();
        return view('billing.index')->with('datas', $datas)->with('todayDate', $todayDate);
    }

    public function bookings($id)
    {
        $todayDate = date("Y-m-d");
        $datas = Billing::join('clients', 'billings.id_clients', '=', 'clients.id')
            ->get();
        return view('billing.index')->with('datas', $datas)->with('todayDate', $todayDate);
    }
    public function export(Request $request)
    {

        $fileName = 'billings.csv';
        $current_date = date("Y-m-d");
        //$endDate = $request->end_date ?? '';
        $endDate = Session::get('endDate');
        $datas = Billing::join('bookings', 'billings.id_booking', '=', 'bookings.id')
            ->join('clients', 'billings.id_client', '=', 'clients.id')
            ->where('dateTo', '=', $endDate)
            ->where('dateTo', '<', $current_date)->get();

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
        $startDate = $request->start_date ?? '';
        $endDate = $request->end_date ?? '';
        Session::put('endDate', $endDate);
        $datas = Billing::join('clients', 'billings.id_client', '=', 'clients.id')
            ->join('bookings', 'billings.id_booking', '=', 'bookings.id')
            ->where('dateFrom', '>=', $startDate)
            ->where('dateTo', '<=', $endDate)
            ->get();
        return view('billing.index')
            ->with('datas', $datas)
            ->with('startDate', $startDate)
            ->with('endDate', $endDate)
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
        $input = $request->all();
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
        $data = Billing::where('id', $id)->update(request()->except(['_token', '_method']));
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
