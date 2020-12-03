<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Camper;
use App\Models\CamperSubCategory;
use App\Models\CamperCategory;
use App\Models\Client;
use App\Models\Countries;
use App\Models\LicenceCategory;
use App\Models\Transmission;
use App\Models\Fuel;
use Illuminate\Http\Request;
use DB;
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
            ->with('selectedCategoryId','');
    }

    public function rentByCategory($id){
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
            ->with('selectedCategoryId',$id);
    }

    public function store2(Request $request)
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
        return view('frontend.camper.rent_out.fill_in_vehicle')
            ->with('licenceCategories',$licenceCategories)
            ->with('camper', $camper)
            ->with('client', $client)
            ->with('countries', $countries)
            ->with('transmissions', $transmissions)
            ->with('fuels', $fuels)
            ->with('camperCategory', $camperCategory);
    }

    public function storeCamperProfile(Request $request)
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
        if($camper->id)
            $camper->update();
        else
            $camper->save();
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
   
        return view('frontend.camper.rent_out.personnal_data')
            ->with('camper', $camper)
            ->with('client', $client)
            ->with('idCamper', $idCamper)
            ->with('useUs', $useUs)
            ->with('languages', $languages)
            ->with('camperCategory', $camperCategory)
            ;
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
        dd($licenceCategories);
        return view('frontend.camper.rent_out.fill_in_vehicle')
            ->with('client',$client)
            ->with('camper',$savedCamper)
            ->with('licenceCategories',$licenceCategories);
    }

}
