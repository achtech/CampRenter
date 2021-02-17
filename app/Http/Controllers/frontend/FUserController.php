<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Avatar;
use Illuminate\Http\Request;

class FUserController extends Controller
{
    public function index()
    {
        if (Controller::getConnectedClient() == null) {
            return redirect(route('frontend.login.client'));
        }
        $client = Controller::getConnectedClient();
        if ($client->staus == 1) {
            $client_status = 'Confirmed';
        } else {
            $client_status = 'Non Confirmed';
        }
        $profil_birth_date = $client->day_of_birth . '/' . $client->month_of_birth . '.' . $client->year_of_birth;
        $avatars = Avatar::limit(9)->get();
        $avatars_first = [];
        $avatars_second = [];
        $avatars_third = [];
        for ($i = 0; $i < 3; $i++) {
            $avatars_first[] = $avatars[$i] ?? '';
        }
        for ($i = 3; $i < 6; $i++) {
            $avatars_second[] = $avatars[$i] ?? '';
        }
        for ($i = 6; $i < 9; $i++) {
            $avatars_third[] = $avatars[$i] ?? '';
        }
        $avatarsIds = Avatar::limit(9)->pluck('id')->toArray();
        $languages = explode(',', $client->language);
        $useUs = explode(',', $client->where_you_see_us);
        return view('frontend.clients.user.index')
            ->with('avatars', $avatars)
            ->with('avatars_first', $avatars_first)
            ->with('avatars_second', $avatars_second)
            ->with('avatars_third', $avatars_third)
            ->with('languages', $languages)
            ->with('useUs', $useUs)
            ->with('avatarsIds', $avatarsIds)
            ->with('client', $client)
            ->with('profil_birth_date', $profil_birth_date)
            ->with('client_status', $client_status);
    }

    public function selectedAvatar(Request $request)
    {
        $client = Controller::getConnectedClient();
        $clt = Client::find($client->id);
        $clt->id_avatars = $request->id;
        $clt->update();
    }

    public function deletePhoto()
    {
        $client = Controller::getConnectedClient();
        $clt = Client::find($client->id);
        $clt->photo = null;
        $clt->update();

    }
}
