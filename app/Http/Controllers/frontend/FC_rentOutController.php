<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Camper;
use App\Models\CamperSubCategory;
use App\Models\Countries;
use App\Models\Fuel;
use App\Models\LicenceCategory;
use App\Models\Transmission;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FC_rentOutController extends Controller
{
    public function index()
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $categories = DB::table('camper_categories')->paginate(10);
        $sub_categories = CamperSubCategory::paginate(10);
        $categorieIds = DB::table('camper_categories')->pluck('id')->toArray();
        $subCategorieIds = DB::table('camper_sub_categories')->pluck('id')->toArray();

        $camper = $this->getNotCompletedCamper($client->id);
        $camper = $camper ?? new Camper();

        return view('frontend.camper.rent_out.rent_out')
            ->with('categories', $categories)
            ->with('camper', $camper)
            ->with('categorieIds',$categorieIds)
            ->with('subCategorieIds', [])
            ->with('sub_categories', [])
            ->with('selectedCategoryId','')
            ->with('isValid',true)
            ;
    }

    public function rentByCategory($id)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $categories = DB::table('camper_categories')->paginate(10);
        $sub_categories = CamperSubCategory::where('id_camper_categories',$id)->get();
        $categorieIds = DB::table('camper_categories')->pluck('id')->toArray();
        $subCategorieIds = DB::table('camper_sub_categories')->where('id_camper_categories',$id)->pluck('id')->toArray();

        $camper = $this->getNotCompletedCamper($client->id);
        $camper = $camper ?? new Camper();

        return view('frontend.camper.rent_out.rent_out')
            ->with('categories', $categories)
            ->with('camper', $camper)
            ->with('categorieIds',$categorieIds)
            ->with('subCategorieIds', $subCategorieIds)
            ->with('sub_categories', $sub_categories)
            ->with('selectedCategoryId',$id)
            ->with('isValid',false)
            ;
    }

    public function storeVehicleData(Request $request)
    {
        $camper = Camper::find($request->id_campers);
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        
        //UPDATE CLIENT
        $input = request()->except(['_token', 'action']);
        if($request->language){
            $input['language'] = join(',', $request->language);
        }
        if($request->where_you_see_us){
            $input['where_you_see_us'] = join(',', $request->where_you_see_us);
        }
        $file = $request->file('photo');
        if ($request->file('photo') && $request->file('photo')->getClientOriginalName()) {
            $input['photo'] = $request->file('photo')->getClientOriginalName();
            $file->move(base_path('public\images\clients'), $file->getClientOriginalName());
        };
        $client->update($input);
        Session::put('_clients', $client);

        $data = DB::table('camper_categories')->find($camper->id);
        $camperCategory =$data->label_en ?? 'No Category';//auth()->user()->lang == "EN" ? "EN" :auth()->user()->lang == "EN" ? "DE" : "FR";

        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $savedCamper = $this->getNotCompletedCamper($client->id);

        $licenceCategories = LicenceCategory::get();
        $countries = Countries::get();
        $transmissions = Transmission::get();
        $fuels = Fuel::get();
        if($request->additional_attribute){
            $camper->additional_attribute = join(',', $request->additional_attribute);
        }
       
        $additionals = [];
        if($camper->additional_attribute){
            $additionals = explode(',', $camper->additional_attribute);
        }

        return view('frontend.camper.rent_out.fill_in_vehicle')
            ->with('licenceCategories',$licenceCategories)
            ->with('camper', $camper)
            ->with('client', $client)
            ->with('countries', $countries)
            ->with('transmissions', $transmissions)
            ->with('fuels', $fuels)
            ->with('additionals', $additionals)
            ->with('camperCategory', $camperCategory);
    }

    public function storeEquipementData(Request $request)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $savedCamper = $this->getNotCompletedCamper($client->id);
        $camper = new Camper();
        if($savedCamper){
            $camper = $savedCamper;
            $camper = Camper::find($savedCamper->id);
        }
        $camper->camper_name = $request->camper_name ?? '';
        $camper->brand = $request->brand ?? '';
        $camper->model = $request->model ?? '';
        $camper->id_licence_categories = $request->id_licence_categories ?? '';
        $camper->license_plate_number = $request->license_plate_number ?? '';
        $camper->vehicle_licence = $request->vehicle_licence ?? '';
        $camper->country = $request->country ?? '';
        $camper->seat_number = $request->seat_number ?? '';
        $camper->gear_number = $request->gear_number ?? '';
        $camper->id_transmissions = $request->id_transmissions ?? '';
        $camper->id_fuels = $request->id_fuels ?? '';
        $camper->leasing_vehicle = $request->leasing_vehicle ?? '';
        $camper->included_kilometres = $request->included_kilometres ?? '';
        $camper->fuel_capacity = $request->fuel_capacity ?? '';
        $camper->fuel_consumation = $request->fuel_consumation ?? '';
        $camper->allowed_total_weight = $request->allowed_total_weight ?? '';
        $camper->length = $request->length ?? '';
        $camper->horse_power = $request->horse_power ?? '';
        $camper->cylinder_capacity = $request->cylinder_capacity ?? '';
        $camper->position_x = $request->position_x ?? '';
        $camper->position_y = $request->position_y ?? '';
        if($request->additional_attribute){
            $camper->additional_attribute = join(',', $request->additional_attribute);
        }
        if ($camper->id) {
        $camper->update();
        } else {
        $camper->save();
        }

        $idCamper = $camper->id;
        $data = DB::table('camper_categories')->find($camper->id_camper_categories);
        $camperCategory =$data ? $data->label_en : '';//auth()->user()->lang == "EN" ? "EN" :auth()->user()->lang == "EN" ? "DE" : "FR";
        $languages = [];
        $useUs = [];
        if($client->language){
            $languages = explode(',', $client->language);
        }
        if($client->where_you_see_us){
            $useUs = explode(',', $client->where_you_see_us);
        }
   
        return view('frontend.camper.rent_out.equipment')
            ->with('camper', $camper)
            ->with('client', $client)
            ->with('idCamper', $idCamper)
            ->with('useUs', $useUs)
            ->with('languages', $languages)
            ->with('camperCategory', $camperCategory)
            ;
    }

    public function equipment()
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $savedCamper = $this->getNotCompletedCamper($client->id);
        $camper = new Camper();
        if($savedCamper){
            $camper = $savedCamper;
            $camper = Camper::find($savedCamper->id);
        }
        $idCamper = $camper->id;
        $data = DB::table('camper_categories')->find($camper->id_camper_categories);
        $camperCategory =$data ? $data->label_en : '';//auth()->user()->lang == "EN" ? "EN" :auth()->user()->lang == "EN" ? "DE" : "FR";
        $additionals = [];
        if($camper->additionals){
            $additionals = explode(',', $camper->additionals);
        }

        return view('frontend.camper.rent_out.equipment')
        ->with('camper', $camper)
        ->with('client', $client)
        ->with('idCamper', $idCamper)
        ->with('additionals', $additionals)
        ->with('camperCategory', $camperCategory);
    }

    public function storePersonalData(Request $request)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $savedCamper = $this->getNotCompletedCamper($client->id);
        $camper = new Camper();
        if($savedCamper){
            $camper = $savedCamper;
            $camper = Camper::find($savedCamper->id);
        }
        $camper->camper_name = $request->camper_name ?? '';
        $camper->description_camper = $request->description ?? '';
        $camper->id_camper_categories = $request->id_camper_categories ?? 0;
        $camper->id_camper_sub_categories = $request->id_camper_sub_categories ?? 0;
        $camper->id_clients = $client->id;
        if ($camper->id) {
            $camper->update();
        } else {
            $camper->save();
        }

        $idCamper = $camper->id;
        $data = DB::table('camper_categories')->find($camper->id_camper_categories);
        $camperCategory =$data ? $data->label_en : '';//auth()->user()->lang == "EN" ? "EN" :auth()->user()->lang == "EN" ? "DE" : "FR";

        $ownerCampers = Camper::where('id_clients',$client->id)->get();
        if(count($ownerCampers)==0){

            $languages = [];
            $useUs = [];
            if($client->language){
                $languages = explode(',', $client->language);
            }
            if($client->where_you_see_us){
                $useUs = explode(',', $client->where_you_see_us);
            }
    
            return view('frontend.camper.rent_out.personnal_data')
                ->with('camper', $camper)
                ->with('client', $client)
                ->with('idCamper', $idCamper)
                ->with('useUs', $useUs)
                ->with('languages', $languages)
                ->with('camperCategory', $camperCategory)
                ;
        }else{
            $licenceCategories = LicenceCategory::get();
            $countries = Countries::get();
            $transmissions = Transmission::get();
            $fuels = Fuel::get();
            if($request->additional_attribute){
                $camper->additional_attribute = join(',', $request->additional_attribute);;
            }
           
            $additionals = [];
            if($camper->additional_attribute){
                $additionals = explode(',', $camper->additional_attribute);
            }
    
            return view('frontend.camper.rent_out.fill_in_vehicle')
                ->with('licenceCategories',$licenceCategories)
                ->with('camper', $camper)
                ->with('client', $client)
                ->with('countries', $countries)
                ->with('transmissions', $transmissions)
                ->with('fuels', $fuels)
                ->with('additionals', $additionals)
                ->with('camperCategory', $camperCategory);
        }
    }

    public function getNotCompletedCamper($idClient){
        return DB::table('campers')->where('id_clients',$idClient)->where('is_completed',0)->first();
    }

    public function fill_in_vehicle()
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $savedCamper = $this->getNotCompletedCamper($client->id);
        $licenceCategories = LicenceCategory::get();
        return view('frontend.camper.rent_out.fill_in_vehicle')
            ->with('client',$client)
            ->with('camper',$savedCamper)
            ->with('licenceCategories',$licenceCategories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function myCamperActions(Request $request, $id)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
}
        $camper = DB::table('campers')->find($id);
        switch ($request->input('action')) {
            case 'edit':
                $categories = DB::table('camper_categories')->paginate(10);
                $sub_categories = CamperSubCategory::paginate(10);
                $categorieIds = DB::table('camper_categories')->pluck('id')->toArray();
                $subCategorieIds = DB::table('camper_sub_categories')->pluck('id')->toArray();
                return view('frontend.camper.rent_out.rent_out')
                    ->with('categories', $categories)
                    ->with('camper', $camper)
                    ->with('categorieIds', $categorieIds)
                    ->with('subCategorieIds', $subCategorieIds)
                    ->with('sub_categories', $sub_categories)
                    ->with('selectedCategoryId', $id);
            case 'detail':
                return redirect(route('frontend.camper.detail', $camper->id));
            case 'delete':
                $camper->delete();
        }

    }

}
