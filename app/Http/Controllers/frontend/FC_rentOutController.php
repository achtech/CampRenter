<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Accessorie;
use App\Models\Booking;
use App\Models\Camper;
use App\Models\CamperCategory;
use App\Models\CamperImage;
use App\Models\CamperInsurance;
use App\Models\CamperSubCategory;
use App\Models\CamperTerms;
use App\Models\Countries;
use App\Models\Equipment;
use App\Models\Fuel;
use App\Models\Insurance;
use App\Models\InsuranceExtra;
use App\Models\LicenceCategory;
use App\Models\Promotion;
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

        $camper = new Camper();

        return view('frontend.camper.rent_out.rent_out')
            ->with('categories', $categories)
            ->with('camper', $camper)
            ->with('categorieIds', $categorieIds)
            ->with('subCategorieIds', [])
            ->with('sub_categories', [])
            ->with('selectedCategoryId', '')
            ->with('selectedSubCategoryId', '')
            ->with('isValid', true)
        ;
    }

    public function rentByCategory($id, $id_camper = '')
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $categories = DB::table('camper_categories')->paginate(10);
        $sub_categories = CamperSubCategory::where('id_camper_categories', $id)->get();
        $categorieIds = DB::table('camper_categories')->pluck('id')->toArray();
        $subCategorieIds = DB::table('camper_sub_categories')->where('id_camper_categories', $id)->pluck('id')->toArray();

        if ($id_camper) {
            $camper = Camper::find($id_camper);
        } else {
            $camper = new Camper();
        }

        return view('frontend.camper.rent_out.rent_out')
            ->with('categories', $categories)
            ->with('camper', $camper)
            ->with('categorieIds', $categorieIds)
            ->with('subCategorieIds', $subCategorieIds)
            ->with('sub_categories', $sub_categories)
            ->with('selectedCategoryId', $id)
            ->with('selectedSubCategoryId', '')
            ->with('isValid', false)
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
        if ($request->language) {
            $input['language'] = join(',', $request->language);
        }
        if ($request->where_you_see_us) {
            $input['where_you_see_us'] = join(',', $request->where_you_see_us);
        }
        $file = $request->file('photo');
        if ($request->file('photo') && $request->file('photo')->getClientOriginalName()) {
            $input['photo'] = $request->file('photo')->getClientOriginalName();
            $file->move(base_path('public/images/clients'), $file->getClientOriginalName());
        };
        $client->update($input);
        Session::put('_clients', $client);

        $data = DB::table('camper_categories')->find($request->id_campers);
        $camperCategory = $data->label_en ?? 'No Category'; //auth()->user()->lang == "EN" ? "EN" :auth()->user()->lang == "EN" ? "DE" : "FR";

        $licenceCategories = LicenceCategory::get();
        $countries = Countries::get();
        $transmissions = Transmission::get();
        $fuels = Fuel::get();
        if ($request->additional_attribute) {
            $camper->additional_attribute = join(',', $request->additional_attribute);
        }

        $additionals = [];
        if ($camper->additional_attribute) {
            $additionals = explode(',', $camper->additional_attribute);
        }

        return view('frontend.camper.rent_out.fill_in_vehicle')
            ->with('licenceCategories', $licenceCategories)
            ->with('camper', $camper)
            ->with('client', $client)
            ->with('countries', $countries)
            ->with('transmissions', $transmissions)
            ->with('fuels', $fuels)
            ->with('additionals', $additionals)
            ->with('camperCategory', $camperCategory);
    }

    public function storeVehicleAndGoToEquipment(Request $request)
    {
        $client = Controller::getConnectedClient();
        $camper = Camper::find($request->id_campers);
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }

        $camper->camper_name = $request->camper_name ?? '';
        $camper->brand = $request->brand ?? '';
        $camper->model = $request->model ?? '';
        $camper->id_licence_categories = $request->id_licence_categories ?? null;
        $camper->license_plate_number = $request->license_plate_number ?? null;
        $camper->vehicle_licence = $request->vehicle_licence ?? null;
        $camper->country = $request->country ?? '';
        $camper->seat_number = $request->seat_number ?? null;
        $camper->gear_number = $request->gear_number ?? null;
        $camper->id_transmissions = $request->id_transmissions ?? null;
        $camper->id_fuels = $request->id_fuels ?? null;
        $camper->leasing_vehicle = $request->leasing_vehicle ?? null;
        $camper->included_kilometres = $request->included_kilometres ?? null;
        $camper->fuel_capacity = $request->fuel_capacity ?? null;
        $camper->fuel_consumation = $request->fuel_consumation ?? null;
        $camper->allowed_total_weight = $request->allowed_total_weight ?? null;
        $camper->length = $request->length ?? null;
        $camper->horse_power = $request->horse_power ?? null;
        $camper->cylinder_capacity = $request->cylinder_capacity ?? null;
        $camper->location = $request->location ?? null;
        $camper->position_x = $request->position_x ?? null;
        $camper->position_y = $request->position_y ?? null;
        if ($request->additional_attribute) {
            $camper->additional_attribute = join(',', $request->additional_attribute);
        }
        if ($camper->id) {
            $camper->update();
        } else {
            $camper->save();
        }

        $idCamper = $camper->id;
        $data = DB::table('camper_categories')->find($camper->id_camper_categories);
        $camperCategory = $data ? $data->label_en : ''; //auth()->user()->lang == "EN" ? "EN" :auth()->user()->lang == "EN" ? "DE" : "FR";
        $languages = [];
        $useUs = [];
        if ($client->language) {
            $languages = explode(',', $client->language);
        }
        if ($client->where_you_see_us) {
            $useUs = explode(',', $client->where_you_see_us);
        }

        $equipement = Equipment::where('id_campers', $camper->id)->first();

        $transport = [];
        $water = [];
        $winter = [];
        $power = [];
        $dimming = [];
        $baby_seat = [];
        $electronics = [];
        $cooking_possibility = [];
        $cooling_possibility = [];
        $bathroom = [];
        $baby_seat = [];
        $additional_equipment_outside = [];

        if ($equipement) {
            if ($equipement->transport) {
                $transport = explode(',', $equipement->transport);
            }
            if ($equipement->water) {
                $water = explode(',', $equipement->water);
            }
            if ($equipement->winter) {
                $winter = explode(',', $equipement->winter);
            }
            if ($equipement->additional_equipment_outside) {
                $additional_equipment_outside = explode(',', $equipement->additional_equipment_outside);
            }
            if ($equipement->power) {
                $power = explode(',', $equipement->power);
            }
            if ($equipement->dimming) {
                $dimming = explode(',', $equipement->dimming);
            }
            if ($equipement->baby_seat) {
                $baby_seat = explode(',', $equipement->baby_seat);
            }
            if ($equipement->electronics) {
                $electronics = explode(',', $equipement->electronics);
            }
            if ($equipement->cooking_possibility) {
                $cooking_possibility = explode(',', $equipement->cooking_possibility);
            }
            if ($equipement->cooling_possibility) {
                $cooling_possibility = explode(',', $equipement->cooling_possibility);
            }
            if ($equipement->bathroom) {
                $bathroom = explode(',', $equipement->bathroom);
            }
            if ($equipement->baby_seat) {
                $baby_seat = explode(',', $equipement->baby_seat);
            }
        }
        return view('frontend.camper.rent_out.equipment')
            ->with('camper', $camper)
            ->with('equipement', $equipement)
            ->with('client', $client)
            ->with('idCamper', $idCamper)
            ->with('useUs', $useUs)
            ->with('languages', $languages)
            ->with('camperCategory', $camperCategory)
            ->with('transport', $transport)
            ->with('water', $water)
            ->with('winter', $winter)
            ->with('additional_equipment_outside', $additional_equipment_outside)
            ->with('power', $power)
            ->with('dimming', $dimming)
            ->with('baby_seat', $baby_seat)
            ->with('electronics', $electronics)
            ->with('cooking_possibility', $cooking_possibility)
            ->with('cooling_possibility', $cooling_possibility)
            ->with('bathroom', $bathroom)
            ->with('baby_seat', $baby_seat)
        ;
    }

    public function storeExtraAndGoToDescription(Request $request)
    {
        $camper = Camper::find($request->id_campers);
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        DB::statement('DELETE FROM camper_accessories WHERE id_campers =' . $camper->id);

        //delete from accessoire where id_camper
        //insert into access
        for ($i = 0; $i < count($request->paid_accessories); $i++) {
            $ele = new Accessorie();

            $ele->id_campers = $camper->id;
            $ele->paid_accessories = $request->paid_accessories[$i];
            $ele->booking_per = $request->booking_per[$i];
            $ele->price = $request->price[$i];
            $ele->save();
        }
        $idCamper = $camper->id;
        $data = DB::table('camper_categories')->find($camper->id_camper_categories);
        $camperCategory = $data ? $data->label_en : ''; //auth()->user()->lang == "EN" ? "EN" :auth()->user()->lang == "EN" ? "DE" : "FR";

        return view('frontend.camper.rent_out.description')
            ->with('camper', $camper)
            ->with('client', $client)
            ->with('idCamper', $idCamper)
            ->with('camperCategory', $camperCategory)
        ;
    }

    public function storeDescriptionAndGoToPhoto(Request $request)
    {
        $camper = Camper::find($request->id_campers);
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }

        $camper->description_camper = $request->description_camper;
        $camper->update();
        $idCamper = $camper->id;
        $data = DB::table('camper_categories')->find($camper->id_camper_categories);
        $camperCategory = $data ? $data->label_en : ''; //auth()->user()->lang == "EN" ? "EN" :auth()->user()->lang == "EN" ? "DE" : "FR";
        $pictures = CamperImage::where('id_campers', $camper->id)->select('image')->get();
        $files = [];
        for ($i = 0; $i < count($pictures); $i++) {
            $files[] = (object) ['file_name' => $pictures[$i]->image, 'id' => $pictures[$i]->id];
        }
        $countFiles = intVal(count($files) / 4);
        $countFiles = $countFiles * 4 == count($files) ? $countFiles : $countFiles + 1;
        return view('frontend.camper.rent_out.slide_camper')
            ->with('camper', $camper)
            ->with('client', $client)
            ->with('files', $files)
            ->with('countFiles', $countFiles)
            ->with('idCamper', $idCamper)
            ->with('camperCategory', $camperCategory)
        ;
    }
    public function removePhoto($camperId, $id)
    {
        DB::statement('DELETE FROM camper_images WHERE id_campers =' . $camperId . ' and id=' . $id);
        return redirect(route('frontend.camper.showPhoto', $camperId));
    }
    public function storeMedia(Request $request)
    {
        $path = public_path('images/campers');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function storePhotosAndGoToInsurance(Request $request)
    {
        $camper = Camper::find($request->id_campers);
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }

        $file = $request->file('image');
        if ($request->file('image') && $request->file('image')->getClientOriginalName()) {
            $camper->image = $request->file('image')->getClientOriginalName();
            $file->move(base_path('public/images/camper'), $file->getClientOriginalName());
            $camper->save();
        }

        if ($request->document && is_array($request->document)) {
            foreach ($request->document as $doc) {
                $camperImage = new CamperImage();
                $camperImage->id_campers = $camper->id;
                $camperImage->image = $doc;
                $camperImage->save();
            }
        }
        $idCamper = $camper->id;
        $data = DB::table('camper_categories')->find($camper->id_camper_categories);
        $camperCategory = $data ? $data->label_en : ''; //auth()->user()->lang == "EN" ? "EN" :auth()->user()->lang == "EN" ? "DE" : "FR";
        $insurance = DB::table('insurances')->get();
        foreach ($insurance as $item) {
            if ($item->allowed_total_weight <= $camper->allowed_total_weight) {
                $camper->insurance_price = $item->price_per_day;
                $camper->id_insurances = $item->id;
            }
        }
        return view('frontend.camper.rent_out.insurance')
            ->with('camper', $camper)
            ->with('client', $client)
            ->with('idCamper', $idCamper)
            ->with('camperCategory', $camperCategory)
        ;
    }

    public function storeEquipmentAndGoToExtra(Request $request)
    {
        $camper = Camper::find($request->id_campers);
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $equipement = Equipment::where('id_campers', $camper->id)->first();
        if ($equipement == null) {
            $equipement = new Equipment();
            $equipement->id_campers = $camper->id;
        }

        $equipement->camping_table = $request->camping_table;
        $equipement->camping_chairs = $request->camping_chairs;
        $equipement->other_additional_equipment = $request->other_additional_equipment;
        $equipement->single_beds = $request->single_beds;
        $equipement->double_beds = $request->double_beds;
        $equipement->air_conditioner = $request->air_conditioner;
        $equipement->heating = $request->heating;
        $equipement->indoor_table = $request->indoor_table;
        $equipement->baby_seat = $request->baby_seat;
        $equipement->sink = $request->sink;
        $equipement->dishes = $request->dishes;
        $equipement->additional_equipment_inside = $request->additional_equipment_inside;
        $equipement->rotatable_seats = $request->rotatable_seats;

        if ($request->bathroom && !empty($request->bathroom)) {
            $equipement->bathroom = join(',', $request->bathroom);
        }
        if ($request->cooling_possibility && !empty($request->cooling_possibility)) {
            $equipement->cooling_possibility = join(',', $request->cooling_possibility);
        }
        if ($request->cooking_possibility && !empty($request->cooking_possibility)) {
            $equipement->cooking_possibility = join(',', $request->cooking_possibility);
        }
        if ($request->electronics && !empty($request->electronics)) {
            $equipement->electronics = join(',', $request->electronics);
        }
        if ($request->baby_seat && !empty($request->baby_seat)) {
            $equipement->baby_seat = join(',', $request->baby_seat);
        }
        if ($request->dimming && !empty($request->dimming)) {
            $equipement->dimming = join(',', $request->dimming);
        }
        if ($request->power && !empty($request->power)) {
            $equipement->power = join(',', $request->power);
        }
        if ($request->additional_equipment_outside && !empty($request->additional_equipment_outside)) {
            $equipement->additional_equipment_outside = join(',', $request->additional_equipment_outside);
        }
        if ($request->winter && !empty($request->winter)) {
            $equipement->winter = join(',', $request->winter);
        }
        if ($request->transport && !empty($request->transport)) {
            $equipement->transport = join(',', $request->transport);
        }
        if ($request->water && !empty($request->water)) {
            $equipement->water = join(',', $request->water);
        }
        $equipement->save();

        $idCamper = $camper->id;
        $data = DB::table('camper_categories')->find($camper->id_camper_categories);
        $camperCategory = $data ? $data->label_en : ''; //auth()->user()->lang == "EN" ? "EN" :auth()->user()->lang == "EN" ? "DE" : "FR";
        $extra = Accessorie::where('id_campers', $idCamper)->get();

        return view('frontend.camper.rent_out.accessories')
            ->with('camper', $camper)
            ->with('client', $client)
            ->with('idCamper', $idCamper)
            ->with('extra', $extra)
            ->with('camperCategory', $camperCategory)
        ;
    }

    public function equipment()
    {
        $camper = Camper::find($request->id_campers);
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $idCamper = $camper->id;
        $data = DB::table('camper_categories')->find($camper->id_camper_categories);
        $camperCategory = $data ? $data->label_en : ''; //auth()->user()->lang == "EN" ? "EN" :auth()->user()->lang == "EN" ? "DE" : "FR";
        $additionals = [];
        if ($camper->additionals) {
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
        $camper = new Camper();
        if (isset($request->id_campers) && !empty($request->id_campers)) {
            $camper = Camper::find($request->id_campers);
        }
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper->camper_name = $request->camper_name ?? '';
        $camper->recommandation = $request->recommandation ?? '';
        $camper->id_camper_categories = $request->id_camper_categories ?? null;
        $camper->id_camper_sub_categories = $request->id_camper_sub_categories ?? null;
        $camper->id_clients = $client->id;
        $camper->save();

        $idCamper = $camper->id;
        $data = DB::table('camper_categories')->find($camper->id_camper_categories);
        $camperCategory = $data ? $data->label_en : ''; //auth()->user()->lang == "EN" ? "EN" :auth()->user()->lang == "EN" ? "DE" : "FR";

        $ownerCampers = Camper::where('id_clients', $client->id)->get();
        if (count($ownerCampers) == 0) {

            $languages = [];
            $useUs = [];
            if ($client->language) {
                $languages = explode(',', $client->language);
            }
            if ($client->where_you_see_us) {
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
        } else {
            $licenceCategories = LicenceCategory::get();
            $countries = Countries::get();
            $transmissions = Transmission::get();
            $fuels = Fuel::get();
            if ($request->additional_attribute) {
                $camper->additional_attribute = join(',', $request->additional_attribute);
            }
            if ($camper->image == null) {
                $camper->image = "camper_rent.png";
                $camper->update();
            }

            $additionals = [];
            if ($camper->additional_attribute) {
                $additionals = explode(',', $camper->additional_attribute);
            }

            return view('frontend.camper.rent_out.fill_in_vehicle')
                ->with('licenceCategories', $licenceCategories)
                ->with('camper', $camper)
                ->with('client', $client)
                ->with('countries', $countries)
                ->with('transmissions', $transmissions)
                ->with('fuels', $fuels)
                ->with('additionals', $additionals)
                ->with('camperCategory', $camperCategory);
        }
    }

    public function showVehicleData($id)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $categories = DB::table('camper_categories')->paginate(10);
        $camper = Camper::find($id);
        $licenceCategories = LicenceCategory::get();
        $countries = Countries::get();
        $transmissions = Transmission::get();
        $fuels = Fuel::get();
        $additionals = [];
        if ($camper->additional_attribute) {
            $additionals = explode(',', $camper->additional_attribute);
        }

        return view('frontend.camper.rent_out.fill_in_vehicle')
            ->with('client', $client)
            ->with('countries', $countries)
            ->with('transmissions', $transmissions)
            ->with('fuels', $fuels)
            ->with('additionals', $additionals)
            ->with('categories', $categories)
            ->with('licenceCategories', $licenceCategories)
            ->with('camper', $camper);
    }

    public function showDescription($id)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper = Camper::find($id);
        return view('frontend.camper.rent_out.description')
            ->with('client', $client)
            ->with('camper', $camper);
    }

    public function showExtra($id)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper = Camper::find($id);
        $extra = Accessorie::where('id_campers', $id)->get();

        return view('frontend.camper.rent_out.accessories')
            ->with('client', $client)
            ->with('extra', $extra)
            ->with('camper', $camper);
    }

    public function showPhoto($id)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper = Camper::find($id);
        $photos = CamperImage::where('id_campers', $id)->get();
        $pictures = CamperImage::where('id_campers', $id)->select(['image', 'id'])->get();
        $files = [];
        for ($i = 0; $i < count($pictures); $i++) {
            $files[] = (object) ['file_name' => $pictures[$i]->image, 'id' => $pictures[$i]->id];
        }
        $countFiles = intVal(count($files) / 4);
        $countFiles = $countFiles * 4 == count($files) ? $countFiles : $countFiles + 1;
        return view('frontend.camper.rent_out.slide_camper')
            ->with('client', $client)
            ->with('photos', $photos)
            ->with('files', $files)
            ->with('countFiles', $countFiles)
            ->with('camper', $camper);
    }
    public function showEquipement($id)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper = Camper::find($id);
        $equipement = Equipment::where('id_campers', $camper->id)->first();

        $transport = [];
        $water = [];
        $winter = [];
        $power = [];
        $dimming = [];
        $baby_seat = [];
        $electronics = [];
        $cooking_possibility = [];
        $cooling_possibility = [];
        $bathroom = [];
        $baby_seat = [];
        $additional_equipment_outside = [];

        if ($equipement) {
            if ($equipement->transport) {
                $transport = explode(',', $equipement->transport);
            }
            if ($equipement->water) {
                $water = explode(',', $equipement->water);
            }
            if ($equipement->winter) {
                $winter = explode(',', $equipement->winter);
            }
            if ($equipement->additional_equipment_outside) {
                $additional_equipment_outside = explode(',', $equipement->additional_equipment_outside);
            }
            if ($equipement->power) {
                $power = explode(',', $equipement->power);
            }
            if ($equipement->dimming) {
                $dimming = explode(',', $equipement->dimming);
            }
            if ($equipement->baby_seat) {
                $baby_seat = explode(',', $equipement->baby_seat);
            }
            if ($equipement->electronics) {
                $electronics = explode(',', $equipement->electronics);
            }
            if ($equipement->cooking_possibility) {
                $cooking_possibility = explode(',', $equipement->cooking_possibility);
            }
            if ($equipement->cooling_possibility) {
                $cooling_possibility = explode(',', $equipement->cooling_possibility);
            }
            if ($equipement->bathroom) {
                $bathroom = explode(',', $equipement->bathroom);
            }
            if ($equipement->baby_seat) {
                $baby_seat = explode(',', $equipement->baby_seat);
            }
        }
        return view('frontend.camper.rent_out.equipment')
            ->with('camper', $camper)
            ->with('equipement', $equipement)
            ->with('client', $client)
            ->with('idCamper', $camper->id)
            ->with('transport', $transport)
            ->with('water', $water)
            ->with('winter', $winter)
            ->with('additional_equipment_outside', $additional_equipment_outside)
            ->with('power', $power)
            ->with('dimming', $dimming)
            ->with('baby_seat', $baby_seat)
            ->with('electronics', $electronics)
            ->with('cooking_possibility', $cooking_possibility)
            ->with('cooling_possibility', $cooling_possibility)
            ->with('bathroom', $bathroom)
            ->with('baby_seat', $baby_seat)
        ;
    }

    public function showInsurance($id)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper = Camper::find($id);
        $t = $camper->allowed_total_weight > 3.5 ? ">3" : "<=3";
        $insurance = Insurance::where('id_camper_categories', $camper->id_camper_categories);
        $insurance = $camper->allowed_total_weight == 0 ? $insurance->get() : $insurance->where('tonage', $t)->get();
        $has_insurance = $camper->has_insurance;

        $extra = DB::table('insurance_extra')
            ->select('name')
            ->groupBy('name')
            ->get();

        $subExtraNames = DB::table('insurance_extra')
            ->select(DB::raw('name, CONCAT(name, sub_extra) AS full_name'))
            ->whereNotNull('sub_extra')
            ->groupBy('name', 'sub_extra')
            ->get();
        $extraInsurance = InsuranceExtra::join('camper_insurances', 'camper_insurances.id_insurance_extra', '=', 'insurance_extra.id')
            ->select('name', 'sub_extra')
            ->where('camper_insurances.id_campers', $id)->get();
        $extraNames = [];
        foreach ($extraInsurance as $extIns) {
            $extraNames[] = $extIns->name;
            $extraNames[] = $extIns->name . ($extIns->sub_extra != null ? '_' . $extIns->sub_extra : '');
        }
        return view('frontend.camper.rent_out.insurance')
            ->with('client', $client)
            ->with('camper', $camper)
            ->with('insurance', $insurance)
            ->with('extra', $extra)
            ->with('has_insurance', $has_insurance)
            ->with('extraNames', $extraNames)
            ->with('subExtraNames', $subExtraNames)
        ;
    }

    public function showRental_terms($id)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper = Camper::find($id);

        return view('frontend.camper.rent_out.rental_terms')
            ->with('client', $client)
            ->with('camper', $camper);
    }

    public function showTerms($id)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper = Camper::find($id);

        $season_main = DB::table('camper_terms')->where('id_campers', $camper->id)->where('season', 'main')->first();
        $season_off = DB::table('camper_terms')
            ->where('id_campers', $camper->id)
            ->where('season', 'Off_may')
            ->first();
        $season_winter = DB::table('camper_terms')->where('id_campers', $camper->id)->where('season', 'winter')->first();

        return view('frontend.camper.rent_out.conditions')
            ->with('client', $client)
            ->with('camper', $camper)
            ->with('season_main', $season_main)
            ->with('season_winter', $season_winter)
            ->with('season_off', $season_off);
    }

    public function showCalendar($id)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper = Camper::find($id);
        $calendar = Booking::where('id_clients', $client->id)->where('id_booking_status', 7)->select(['start_date', 'end_date', 'comment'])->get();

        return view('frontend.camper.rent_out.calendar')
            ->with('client', $client)
            ->with('camper', $camper)
            ->with('blokedPeriods', $calendar);
    }

    public function fillInVehicle()
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper = new Camper();
        $licenceCategories = LicenceCategory::get();
        return view('frontend.camper.rent_out.fill_in_vehicle')
            ->with('client', $client)
            ->with('camper', $camper)
            ->with('licenceCategories', $licenceCategories);
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
        switch ($request->input('action')) {
            case 'edit':
                return redirect(route('frontend.camper.showVehicleData', $id));
            case 'detail':
                return redirect(route('frontend.camper.detail', $id));
            case 'delete':
                $camper = DB::table('campers')->where('id', $id)->delete();
                return redirect(route('frontend.clients.camper'));
        }

    }

    public function storeInsurance(Request $request)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper = Camper::find($request->id_campers);
        $camper->allowed_total_weight = $request->allowed_total_weight ?? null;
        $insurance = DB::table('insurances')->get();
        foreach ($insurance as $item) {
            if ($item->allowed_total_weight <= $camper->allowed_total_weight) {
                $camper->insurance_price = $item->price_per_day;
                $camper->id_insurances = $item->id;
            }
        }
        if ($camper->id) {
            $camper->update();
        } else {
            $camper->save();
        }
        return view('frontend.camper.rent_out.insurance')
            ->with('camper', $camper)
            ->with('client', $client);
    }

    public function storeRental_terms(Request $request)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper = Camper::find($request->id_campers);
        $extra_insurance = InsuranceExtra::all();
        DB::statement('DELETE FROM camper_insurances WHERE id_campers =' . $camper->id);

        foreach ($extra_insurance as $ex) {
            if ($request[str_replace(' ', '_', $ex->name)] == 1) {
                if (isset($request[str_replace(' ', '_', $ex->name) . "_"]) && !empty($request[str_replace(' ', '_', $ex->name) . "_"])) {
                    $subExtra = $request[str_replace(' ', '_', $ex->name) . "_"];
                    $idSubExtra = InsuranceExtra::where('name', $ex->name)->where('sub_extra', $subExtra)->first()->id;
                    DB::statement('DELETE FROM camper_insurances WHERE id_campers =' . $camper->id . ' and id_insurance_extra =' . $idSubExtra);

                    $newData = CamperInsurance::create([
                        'id_campers' => $request->id_campers,
                        'id_insurance_extra' => $idSubExtra,
                    ]);
                    // $request->request->remove(str_replace(' ', '_', $ex->name) . "_");
                } else {
                    $newData = CamperInsurance::create([
                        'id_campers' => $request->id_campers,
                        'id_insurance_extra' => $ex->id,
                    ]);
                }
                $newData->save();

            }
        }

        $camper->has_insurance = $request->has_insurance;
        $camper->update();

        return view('frontend.camper.rent_out.rental_terms')
            ->with('camper', $camper)
            ->with('client', $client);
    }

    public function storeterms(Request $request)
    {
        $camper = Camper::find($request->id_campers);
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper->minimum_age = $request->minimum_age ?? null;
        $camper->license_age = $request->license_age ?? null;
        $camper->animals_allowed = $request->animals_allowed ?? null;
        $camper->smoking_allowed = $request->smoking_allowed ?? null;
        $camper->kilometres_per_night = $request->kilometres_per_night ?? null;
        $camper->additional_equipment_out = $request->additional_equipment_out ?? null;
        if ($camper->id) {
            $camper->update();
        } else {
            $camper->save();
        }

        $season_main = DB::table('camper_terms')->where('id_campers', $camper->id)->where('season', 'main')->first();
        $season_off = DB::table('camper_terms')
            ->where('id_campers', $camper->id)
            ->where('season', 'Off_may')
            ->first();
        $season_winter = DB::table('camper_terms')->where('id_campers', $camper->id)->where('season', 'winter')->first();

        return view('frontend.camper.rent_out.conditions')
            ->with('client', $client)
            ->with('camper', $camper)
            ->with('season_main', $season_main)
            ->with('season_winter', $season_winter)
            ->with('season_off', $season_off);
    }

    public function saveterms(Request $request)
    {
        $camper = Camper::find($request->id_campers);
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        $camper_terms = DB::table('camper_terms')->where('id_campers', $camper->id)->first();
        if ($camper_terms == null) {
            $camper_terms = new CamperTerms();
            //delete old data for this camper
        }

        if ($request->price_per_night_main != null && $request->price_per_night_main != null) {
            $camper_terms_main = new CamperTerms();
            $camper_terms_main->season = 'main';
            $camper_terms_main->minimum_night = $request->minimum_night_main ?? null;
            $camper_terms_main->price_per_night = $request->price_per_night_main ?? null;
            $camper_terms_main->start_month = 7;
            $camper_terms_main->end_month = 8;
            $camper_terms_main->id_campers = $camper->id;
            $camper_terms_main->save();

        }
        if ($request->price_per_night_off != null && $request->minimum_night_off != null) {
            $camper_terms_off = new CamperTerms();
            $camper_terms_off->season = 'Off_may';
            $camper_terms_off->minimum_night = $request->minimum_night_off ?? null;
            $camper_terms_off->price_per_night = $request->price_per_night_off ?? null;
            $camper_terms_off->start_month = 5;
            $camper_terms_off->end_month = 6;
            $camper_terms_off->id_campers = $camper->id;
            $camper_terms_off->save();

        }
        if ($request->price_per_night_winter != null && $request->minimum_night_winter != null) {
            $camper_terms_winter = new CamperTerms();
            $camper_terms_winter->season = 'winter';
            $camper_terms_winter->minimum_night = $request->minimum_night_winter ?? null;
            $camper_terms_winter->price_per_night = $request->price_per_night_winter ?? null;
            $camper_terms_winter->start_month = 11;
            $camper_terms_winter->end_month = 4;
            $camper_terms_winter->id_campers = $camper->id;
            $camper_terms_winter->save();
        }
        $calendar = Booking::where('id_clients', $client->id)->where('id_booking_status', 7)->select(['start_date', 'end_date', 'comment'])->get();
        return view('frontend.camper.rent_out.calendar')
            ->with('client', $client)
            ->with('camper', $camper)
            ->with('blokedPeriods', $calendar);
    }

    public function calc_nights_main_ajax(Request $request)
    {
        $price_per_day = $request->price_per_night_main;
        $minimal_rent_days_main = $request->minimum_night_main;
        $total = $minimal_rent_days_main * $price_per_day;
        $per = Promotion::where('status', 1)->first()->commission;
        $fee = ($total * $per) / 100;
        $owner_part = $total - $fee;

        $html = "";
        $html .= "<div class='col-md-12' style='margin-top:10px;'>
            <div class='col-md-9' >
                <div class='col-md-12' >
                    <p><strong>Sample booking high season (average booking on CampUnite of 10 nights)</strong></p>
                </div>
                <div class='col-md-6' >
                    <p><h5>Owner earnings</h5></p>
                    <p><h5>Service fee</h5></p>
                    <p><h5><strong>rental nights</strong></h5></p>
                </div>
                <div class='col-md-6' >
                    <p><h5>CHF $owner_part</h5></p>
                    <p><h5>CHF $fee</h5></p>
                    <p><h5><strong>CHF $total<strong></h5></p>
                </div>
            </div>
        </div>";

        echo $html;

    }

    public function calc_nights_off_ajax(Request $request)
    {
        $price_per_day = $request->price_per_night_off ?? 1;
        $minimal_rent_days_off = $request->minimum_night_off ?? 1;
        $total = $minimal_rent_days_off * $price_per_day;
        $per = Promotion::where('status', 1)->first()->commission;
        $fee = ($total * $per) / 100;
        $owner_part = $total - $fee;

        $html = "";
        $html .= "<div class='col-md-12' style='margin-top:10px;'>
            <div class='col-md-9' >
                <div class='col-md-12' >
                    <p><strong>Sample booking for your minimum period:</strong></p>
                </div>
                <div class='col-md-6' >
                    <p><h5>Owner earnings</h5></p>
                    <p><h5>Service fee</h5></p>
                    <p><h5><strong>rental nights</strong></h5></p>
                </div>
                <div class='col-md-6' >
                    <p><h5>CHF" . $price_per_day . "</h5></p>
                    <p><h5>CHF $fee </h5></p>
                    <p><h5><strong>CHF $total<strong></h5></p>
                </div>
            </div>
        </div>";

        echo $html;
    }

    public function calc_nights_winter_ajax(Request $request)
    {
        $price_per_day = $request->price_per_night_winter;
        $minimal_rent_days_winter = $request->minimum_night_winter;
        $total = $minimal_rent_days_winter * $price_per_day;
        $per = Promotion::where('status', 1)->first()->commission;
        $fee = ($total * $per) / 100;
        $owner_part = $total - $fee;

        $html = "";
        $html .= "<div class='col-md-12' style='margin-top:10px;'>
            <div class='col-md-9' >
                <div class='col-md-12' >
                    <p><strong>Sample booking for your minimum period:</strong></p>
                </div>
                <div class='col-md-6' >
                    <p><h5>Owner earnings</h5></p>
                    <p><h5>Service fee</h5></p>
                    <p><h5><strong>rental nights</strong></h5></p>
                </div>
                <div class='col-md-6' >
                    <p><h5>CHF $owner_part</h5></p>
                    <p><h5>CHF $fee</h5></p>
                    <p><h5><strong>CHF $total<strong></h5></p>
                </div>
            </div>
        </div>";

        echo $html;
    }

    public function storeCalendar(Request $request)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
        DB::statement('DELETE FROM bookings WHERE id_campers =' . $request->id_campers . ' and id_booking_status=7');

        if ($request->period && count($request->period) > 0) {
            foreach ($request->period as $item) {
                if (isset($item['start']) && isset($item['end']) && isset($item['title'])) {
                    $booking = new Booking();
                    $booking->id_campers = $request->id_campers;
                    $booking->id_clients = $client->id;
                    $booking->id_booking_status = 7;
                    //other fields from database to be added

                    $booking->start_date = date('Y-m-d H:i:s', strtotime($item['start']));
                    $booking->end_date = date('Y-m-d H:i:s', strtotime($item['end']));
                    $booking->comment = $item['title'];
                    $booking->save();
                }
            }
        }
        $camper = Camper::find($request->id_campers);
        $calendar = Booking::where('id_clients', $client->id)->where('id_booking_status', 7)->select(['start_date', 'end_date', 'comment'])->get();
        return view('frontend.camper.rent_out.calendar')
            ->with('client', $client)
            ->with('camper', $camper)
            ->with('blokedPeriods', $calendar);
    }

    public static function getCategoriePhoto($id)
    {
        return CamperCategory::find($id)->image;
    }

    public function toBeConfirmed($id)
    {
        $camper = Camper::find($id);
        $camper->is_completed = 1;
        $camper->save();
        return redirect(route('frontend.camper.detail', $camper->id));
    }

    public static function getExtraDatas($name)
    {
        return InsuranceExtra::where('name', $name)->get();
    }
    public static function getSubExtra($name)
    {
        return InsuranceExtra::where('name', $name)->whereNotNull('sub_extra')->get();
    }

    public static function getSubExtraDatas($name, $subExtraName)
    {
        return InsuranceExtra::where('name', $name)->where('sub_extra', $subExtraName)->get();
    }
}
