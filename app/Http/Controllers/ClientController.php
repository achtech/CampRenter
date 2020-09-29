<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Client;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = '';
        if (isset($request) && null !== $request->get('search')) {
            $search = $request->get('search');
            $datas = Client::where('client_name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $datas = Client::paginate(10);
        }
        return view('client.index')->with('datas', $datas)->with('search', $search);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('owner.index'));
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
        $input['driving_licence_image'] = 1;
        $input['id_avatars'] = 1;
        $input['image_national_id'] = 1;
        $data = Client::create($input);
        return redirect(route('client.index'))->with('success', 'Item added succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Client::find($id);
        //dd($data);
        return view('owners.edit')->with('data', $data);
    }
    public function detail($id)
    {
        $data = Client::find($id);
        return view('client.detail')->with('data', $data);
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
        //   dd($request->all());
        $data = Client::find($id);
        if (empty($data)) {
            return redirect(route('client.index'));
        }
        $data = Client::where('id', $id)->update(request()->except(['_token', '_method', 'action']));
        return redirect(route('client.index'))->with('success', 'Item Updated succesfully');
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
        $data = Client::find($id);
        if (empty($data)) {
            return redirect(route('client.index'));
        }
        $data->delete();
        return redirect(route('client.index'));
    }

    public function blockClient($id)
    {
        $data = Client::find($id);
        if (empty($data)) {
            return redirect(route('client.index'));
        }
        $data->status = 'blocked';
        $data->save();
        return redirect(route('client.index'));
    }
    public function activateClient($id)
    {
        $data = Client::find($id);
        if (empty($data)) {
            return redirect(route('client.index'));
        }
        $data->status = 'active';
        $data->save();
        return redirect(route('client.index'));
    }
    public function checkEquipmentDetail($id)
    {
        $datas = Equipment::where('id_client', $id)->get();
        return view('client.detailEquipment')->with('datas', $datas);
    }
    public function checkBookingDetail($id)
    {
        $remaining_days = 0;
        $datas = Booking::where('id_clients', $id)
            ->join('equipments', 'bookings.id_equipments', '=', 'equipments.id')
            ->get();
        foreach ($datas as $elem) {
            $diff = abs(strtotime($elem->dateFrom) - strtotime($elem->dateTo));
            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $remaining_days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        }
        return view('client.bookingDetail')->with('datas', $datas)->with('remaining_days', $remaining_days);
    }
    public static function getCurrentSolde($id)
    {
        return $id;
    }
    public static function getTotalsSolde($id)
    {
        return $id;
    }
}
