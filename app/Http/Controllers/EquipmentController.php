<?php

namespace App\Http\Controllers;



use App\Models\Equipment;
use App\Models\Client;
use App\Models\EquipmentCategory;
use App\Models\LicenceCategory;
use App\Models\Transmission;
use App\Models\Fuel;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;

class EquipmentController extends Controller
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
            $datas = Equipment::where('equipment_name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $datas = Equipment::paginate(10);
        }
        return view('equipment.index')->with('datas', $datas)->with('search', $search);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all()->pluck('client_name', 'id');
        $equipmentCategories = EquipmentCategory::all()->pluck('label_en', 'id');

        return view('equipment.create')
            ->with('clients', $clients)
            ->with('equipmentCategories', $equipmentCategories);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('equipment.details');
    }

    public function detailBooking($id)
    {
        $data = Equipment::find($id);
        $clients = Client::find($data->id_client) != null ? Client::find($data->id_client)->first() : new Client();
        $equipment_categories = EquipmentCategory::find($data->id_licence_categories)->first();
        $licenceCategories = LicenceCategory::find($data->id_licence_categories)->first();
        $transmissions = Transmission::find($data->id_transmissions) != null ? Transmission::find($data->id_transmissions)->first() : new Transmission();
        $fuels = Fuel::find($data->id_fuels) != null ? Fuel::find($data->id_fuels)->first() : new Fuel();
        return view('equipment.detailBooking')
            ->with('data', $data)
            ->with('clients', $clients)
            ->with('equipmentCategory', $equipment_categories)
            ->with('licenceCategories', $licenceCategories)
            ->with('fuels', $fuels)
            ->with('transmissions', $transmissions);
    }

    public function detailEquipment($id)
    {
        $data = Equipment::find($id);
        $clients = Client::find($data->id_client) != null ? Client::find($data->id_client)->first() : new Client();
        $equipment_categories = EquipmentCategory::find($data->id_licence_categories)->first();
        $licenceCategories = LicenceCategory::find($data->id_licence_categories)->first();
        $transmissions = Transmission::find($data->id_transmissions) != null ? Transmission::find($data->id_transmissions)->first() : new Transmission();
        $fuels = Fuel::find($data->id_fuels) != null ? Fuel::find($data->id_fuels)->first() : new Fuel();
        return view('equipment.detailEquipment')
            ->with('data', $data)
            ->with('clients', $clients)
            ->with('equipmentCategory', $equipment_categories)
            ->with('licenceCategories', $licenceCategories)
            ->with('fuels', $fuels)
            ->with('transmissions', $transmissions);
    }

    public function detail($id)
    {
        $data = Equipment::find($id);
        $clients = Client::find($data->id_client) != null ? Client::find($data->id_client)->first() : new Client();
        $equipment_categories = EquipmentCategory::find($data->id_licence_categories)->first();
        $licenceCategories = LicenceCategory::find($data->id_licence_categories)->first();
        $transmissions = Transmission::find($data->id_transmissions) != null ? Transmission::find($data->id_transmissions)->first() : new Transmission();
        $fuels = Fuel::find($data->id_fuels) != null ? Fuel::find($data->id_fuels)->first() : new Fuel();
        return view('equipment.details')
            ->with('data', $data)
            ->with('clients', $clients)
            ->with('equipmentCategory', $equipment_categories)
            ->with('licenceCategories', $licenceCategories)
            ->with('fuels', $fuels)
            ->with('transmissions', $transmissions);
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
        $data = Equipment::create($input);
        return redirect(route('equipment.index'))->with('success', 'Item added succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Equipment::find($id);
        $clients = Client::all()->pluck('name_client', 'id');
        $equipment_categories = EquipmentCategory::all()->pluck('label_en', 'id');
        return view('equipment.edit', ['id' => 1])
            ->with('data', $data)
            ->with('clients', $clients)
            ->with('insuranceCompanies', $equipment_categories);
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
        $data = Equipment::find($id);
        if (empty($data)) {
            return redirect(route('equipment.index'));
        }
        $data = Equipment::where('id', $id)->update(request()->except(['_token', '_method']));
        return redirect(route('equipment.index'))->with('success', 'Item Updated succesfully');
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
        $data = Equipment::find($id);
        if (empty($data)) {
            return redirect(route('equipment.index'));
        }
        $data->delete();
        return redirect(route('equipment.index'));
    }

    public static function getLabel($table, $id)
    {
        return DB::table($table)->find($id)->label_en;
    }

    public static function getName($table, $id)
    {
        return DB::table($table)->find($id)->client_name;
    }

    public static function getCamperName($table, $id)
    {
        return DB::table($table)->find($id)->label_en;
    }
    public function getUnconfirmedCampers()
    {

        $datas = Equipment::where('is_confirmed', 0)->get();
        return view('equipment.equipmentToConfirm')->with('datas', $datas);
    }
    public function confirm($id)
    {
        $datas = Equipment::find($id);
        $datas->is_confirmed = 1;
        $datas->save();
        return redirect(route('dashboard'));
    }
}
