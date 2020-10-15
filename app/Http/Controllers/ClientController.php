<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\Booking;
use App\Models\Camper;
use App\Models\CamperCategory;
use App\Models\Client;
use App\Models\Fuel;
use App\Models\LicenceCategory;
use App\Models\Transmission;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        $input = request()->except(['_token', '_method', 'action']);
        $input['created_by'] = auth()->user()->id;
        $input['updated_by'] = auth()->user()->id;
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
        return view('owners.edit')->with('data', $data);
    }
    public function detail($id)
    {
        $client = Client::find($id);
        $data = Client::find($id);
        $datas = Avatar::where('id', $data->id_avatars)->first();
        $avatar = $datas != null ? $datas['image'] : 'default.jpg';
        $driving_licence_image = $datas != null ? $datas['driving_licence_image'] : 'default.jpg';
        $image_national_id = $datas != null ? $datas['image_national_id'] : 'default.jpg';
        return view('client.detail')->with('data', $data)->with('avatar', $avatar)->with('client', $client)->with('driving_licence_image', $driving_licence_image)->with('image_national_id', $image_national_id);
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
        $input = request()->except(['_token', '_method', 'action']);
        $input['updated_by'] = auth()->user()->id;
        $data = Client::where('id', $id)->update($input);
        return redirect(route('client.index'))->with('success', 'Item Updated succesfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blockActivateClient($id)
    {
        $data = Client::find($id);
        $data->status = $data->status == '0' ? '1' : '0';
        $data->updated_by = auth()->user()->id;
        $data = $data->update();
        return redirect(route('client.index'));
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
        //dd($id);
        $data = Client::find($id);
        if (empty($data)) {
            return redirect(route('client.index'));
        }
        $data->status = 'active';
        $data->save();

        return redirect(route('client.index'));
    }
    public function checkCamperDetail($id)
    {
        $datas = Camper::where('id_clients', $id)->get();
        $client = Client::find($id);
        return view('client.detailCamper')->with('datas', $datas)->with('client', $client);
    }
    public function checkBookingDetail($id)
    {
        $client = Client::find($id);
        $remaining_days = 0;
        $datas = Booking::where('id_clients', $id)
            ->join('campers', 'bookings.id_campers', '=', 'campers.id')
            ->join('clients', 'bookings.id_clients', '=', 'clients.id')
            ->get();
        foreach ($datas as $elem) {
            $diff = abs(strtotime($elem->start_date) - strtotime($elem->end_date));
            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $remaining_days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        }
        return view('client.bookingDetail')->with('datas', $datas)->with('remaining_days', $remaining_days)->with('client', $client);
    }

    public static function getCurrentSolde($id)
    {
        $bookings = Booking::leftjoin('campers', 'bookings.id_campers', '=', 'campers.id')
            ->where('campers.id_clients', $id)
            ->where('bookings.status_billings', 'Not Payed')
            ->where('bookings.id_booking_status', '2')
            ->select(DB::raw('sum((total/100) * (100-commission)) as total'));
        return $bookings->first()->total ?? '0';
    }

    public static function toTransfertSolde($id)
    {
        $bookings = Booking::leftjoin('campers', 'bookings.id_campers', '=', 'campers.id')
            ->where('campers.id_clients', $id)
            ->where('bookings.status_billings', 'Not Payed')
            ->where('bookings.id_booking_status', '3')
            ->select(DB::raw('sum((total/100) * (100-commission)) as total'));
        return $bookings->first()->total ?? '0';
    }
    public static function getTotalsSolde($id)
    {
        $bookings = Booking::leftjoin('campers', 'bookings.id_campers', '=', 'campers.id')
            ->where('campers.id_clients', $id)
            ->where('bookings.id_booking_status', '3')
            ->select(DB::raw('sum((total/100) * (100-commission)) as total'));
        return $bookings->first()->total ?? '0';
    }

    public static function getCampUnitPart($id)
    {
        $bookings = Booking::leftjoin('campers', 'bookings.id_campers', '=', 'campers.id')
            ->where('campers.id_clients', $id)
            ->where('bookings.id_booking_status', '>=', '2')
            ->select(DB::raw('sum((total/100) * commission) as total'));
        return $bookings->first()->total ?? '0';
    }
    public function clientCampers($id)
    {
        $datas = Camper::where('id_clients', $id)->get();
        $client = Client::find($id)->first();
        $camper_categories = CamperCategory::find($datas[0]->id_camper_categories)->first();
        $licenceCategories = LicenceCategory::find($datas[0]->id_licence_categories)->first();
        $transmissions = Transmission::find($datas[0]->id_transmissions)->first();
        $fuels = Fuel::find($datas[0]->id_fuels)->first();
        return view('client.clientCampers')
            ->with('datas', $datas)
            ->with('client', $client)
            ->with('camperCategory', $camper_categories)
            ->with('licenceCategories', $licenceCategories)
            ->with('fuels', $fuels)
            ->with('transmissions', $transmissions);
    }
    public function clientBookings($id)
    {
        $datas = DB::table('v_bookings_details')->where('renter_id', $id)->get();
        $client = Client::find($id);
        return view('client.clientBookings')->with('datas', $datas)->with('client', $client);
    }

}
