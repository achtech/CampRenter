<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Camper;
use App\Models\CamperCategory;
use App\Models\CamperImage;
use App\Models\CamperStatus;
use App\Models\Client;
use App\Models\Fuel;
use App\Models\LicenceCategory;
use App\Models\Transmission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CamperController extends Controller
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
        $datas = Camper::where('is_deleted', 1)->orderBy('updated_at','desc')->get();

        return view('admin.camper.index')->with('datas', $datas);
    }

    public static function getCamperStatus($id)
    {
        $data = DB::table('v_camper_status')->where('camperId', $id)->first();
        if ($data != null) {
            return $data;
        } else {
            $datas = new CamperStatus();
            $datas->label_en = "Available";
            $datas->label_de = "Available";
            $datas->label_fr = "Available";
            $datas->bookingStatusId = 10;
            return $datas;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all()->pluck('client_name', 'id');
        $camperCategories = CamperCategory::all()->pluck(app()->getLocale() == 'de' ? 'label_de' : (app()->getLocale() == 'en' ? 'label_en' : 'label_fr'), 'id');

        return view('admin.camper.create')
            ->with('clients', $clients)
            ->with('camperCategories', $camperCategories);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.camper.details');
    }

    public function detailBooking($id)
    {
        $data = Camper::find($id);
        $clients = Client::find($data->id_client) != null ? Client::find($data->id_client)->first() : new Client();
        $camper_categories = CamperCategory::find($data->id_licence_categories)->first();
        $licenceCategories = LicenceCategory::find($data->id_licence_categories)->first();
        $transmissions = Transmission::find($data->id_transmissions) != null ? Transmission::find($data->id_transmissions)->first() : new Transmission();
        $fuels = Fuel::find($data->id_fuels) != null ? Fuel::find($data->id_fuels)->first() : new Fuel();
        return view('admin.camper.detailBooking')
            ->with('data', $data)
            ->with('clients', $clients)
            ->with('camperCategory', $camper_categories)
            ->with('licenceCategories', $licenceCategories)
            ->with('fuels', $fuels)
            ->with('transmissions', $transmissions);
    }

    public function detail($id)
    {
        $camper = Camper::find($id);
        $owner = Client::find($camper->id_clients);
        $camper_categories = CamperCategory::find($camper->id_camper_categories);
        $licenceCategories = LicenceCategory::find($camper->id_licence_categories);
        $transmissions = Transmission::find($camper->id_transmissions);
        $fuels = Fuel::find($camper->id_fuels);
        $gallery = CamperImage::where('id_campers', $id)
            ->get();
        $booking_camper = Booking::leftjoin('clients', 'bookings.id_clients', '=', 'clients.id')
            ->where('id_campers', $id)->get();

        return view('admin.camper.details')
            ->with('data', $camper)
            ->with('clients', $owner)
            ->with('licenceCategories', $licenceCategories)
            ->with('fuels', $fuels)
            ->with('transmissions', $transmissions)
            ->with('booking_camper', $booking_camper)
            ->with('camper_categories', $camper_categories)
            ->with('gallery', $gallery);
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
        $data = Camper::create($input);
        return redirect(route('camper.index'))->with('success', 'Item added succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Camper::find($id);
        $clients = Client::all()->pluck('name_client', 'id');
        $camperCategories = CamperCategory::all()->pluck(app()->getLocale() == 'de' ? 'label_de' : (app()->getLocale() == 'en' ? 'label_en' : 'label_fr'), 'id');
        return view('admin.camper.edit', ['id' => 1])
            ->with('data', $data)
            ->with('clients', $clients)
            ->with('insuranceCompanies', $camper_categories);
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
        $data = Camper::find($id);
        if (empty($data)) {
            return redirect(route('camper.index'));
        }
        if ($data->is_confirmed == '0') {
            $data->is_confirmed = '1';
        } else {
            $data->is_confirmed = '0';
        }
        $data->save();
        $input = request()->except(['_token', '_method', 'action']);
        $input['updated_by'] = auth()->user()->id;
        $data = Camper::where('id', $id)->update($input);
        return redirect(route('camper.index'))->with('success', 'Item Updated succesfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blockActivateCamper(Request $request)
    {
        $data = Camper::find($request->id);
        $data->is_confirmed = $data->is_confirmed == '1' || $data->is_confirmed == 1 ? 0 : 1;
        $data->updated_by = auth()->user()->id;
        $data = $data->save();
        return redirect(route('camper.index'));
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
        $data = Camper::find($id);
        if (empty($data)) {
            return redirect(route('camper.index'));
        }
        $data->is_deleted = 0;
        $data->update();
        return redirect(route('camper.index'));
    }

    public static function getBookingCamperStart($id)
    {
        $today = date('Y-m-d');
        $data = Booking::where('id_campers', $id)->whereDate('start_date', '<=', $today)->whereDate('end_date', '>=', $today)->first();
        if ($data) {
            return date('Y-m-d', strtotime($data->start_date));
        } else {
            return '';
        }
    }

    public static function getBookingCamperEnd($id)
    {
        $today = date('Y-m-d');
        $data = Booking::where('id_campers', $id)->whereDate('start_date', '<=', $today)->whereDate('end_date', '>=', $today)->first();
        if ($data) {
            return date('Y-m-d', strtotime($data->end_date));
        } else {
            return '';
        }
    }

    public static function getLabel($table, $id)
    {
        $data = DB::table($table)->find($id);
        return app()->getLocale() == 'de' ? $data->label_de : (app()->getLocale() == 'en' ? $data->label_en : $data->label_fr);
    }

    public static function getName($table, $id)
    {
        return DB::table($table)->find($id)->client_name;
    }

    public static function getCamperName($table, $id)
    {
        $data = DB::table($table)->find($id);
        return app()->getLocale() == 'de' ? $data->label_de : (app()->getLocale() == 'en' ? $data->label_en : $data->label_fr);
    }
    public function getUnconfirmedCampers()
    {

        $datas = Camper::where('is_confirmed', 0)->get();
        return view('admin.camper.camperToConfirm')->with('datas', $datas);
    }
    public function confirm($id)
    {
        $datas = Camper::find($id);
        $datas->is_confirmed = 1;
        $data->updated_by = auth()->user()->id;
        $datas->save();
        return redirect(route('dashboard'));
    }

    public function reviews($id)
    {
        $datas = DB::table('camper_reviews')->where('id_campers', $id)->get();
        $camper = Camper::find($id);
        return view('admin.camper.camperReviews')->with('datas', $datas)->with('camper', $camper);
    }
}
