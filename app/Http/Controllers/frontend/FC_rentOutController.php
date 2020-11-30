<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Camper;
use App\Models\CamperSubCategory;
use App\Models\CamperCategory;
use App\Models\Client;
use Illuminate\Http\Request;
use DB;
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
        $subCategorieIds = DB::table('sub_camper_categories')->pluck('id')->toArray();

        $camper = $this->getNotCompletedCamper($client->id);
        $camper = $camper ?? new Camper();

        return view('frontend.camper.rent_out.rent_out')
            ->with('categories', $categories)
            ->with('camper', $camper)
            ->with('categorieIds',$categorieIds)
            ->with('avatarsIds',$avatarsIds)
            ->with('subCategorieIds', $subCategorieIds);
    }

    public function storePersonnalData(Request $request)
    {
        $camper = new Camper();
        $camper->id_camper_categories = $request->id_camper_categories;
        $camper->camper_name = $request->camper_name;
        $camper->description = $request->description;
        return view('frontend.camper.rent_out.personnal_data')->with('camper', $camper);
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
        return view('frontend.camper.rent_out.personnal_data')
            ->with('camper', $camper)
            ->with('client', $client)
            ->with('idCamper', $idCamper)
            ;
    }

    public function getNotCompletedCamper($idClient){
        return DB::table('campers')->where('id_clients',$idClient)->where('is_completed',0)->first();
    }
}
