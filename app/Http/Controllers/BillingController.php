<?php

namespace App\Http\Controllers;

use App\AnneeScolaire;
use App\AnneesScolaire;
use App\Exports\BillingExport;
use App\Models\Avatars;
use App\Models\Billing;
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
        $datas = Billing::join('clients', 'billings.id_client', '=', 'clients.id')
            ->join('bookings', 'billings.id_booking', '=', 'bookings.id')
            ->join('equipments', 'bookings.id_equipments', '=', 'equipments.id')
            ->get();
        return view('billing.index')->with('datas', $datas)->with('todayDate', $todayDate);
    }

    public function export()
    {
        return Excel::download(new BillingExport, 'billings.xlsx');
    }
    public function filter()
    {
        dd(1);
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
