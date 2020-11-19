<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CamperBookmark;
use DB;
use Illuminate\Http\Request;

class FC_bookmarkController extends Controller
{
    public function index()
    {
        $client = Controller::getConnectedClient();
        $datas = DB::table("v_bookmark_camper")->where('id_clients', $client->id)->get();
        return view('frontend.clients.bookmark.index')
            ->with('datas', $datas);
    }

    public static function getBookmarkCamperCount($id)
    {
        return DB::table('camper_bookmarks')->where('id_campers', $id)->get()->count();
    }

    public static function isBookmarked($id)
    {
        $client = Controller::getConnectedClient();
        $clientId = $client ? $client->id : 0;
        return DB::table('camper_bookmarks')->where('id_clients', $clientId)->where('id_campers', $id)->get()->count() > 0;
    }

    public function addOrRemove(Request $request)
    {
        $cb = new CamperBookmark();
        $client = Controller::getConnectedClient();
        $cb->id_clients = $client ? $client->id : 0;
        $cb->id_campers = $request ? $request->camperid : 0;

        $bookmark = DB::table('camper_bookmarks')->where('id_clients', $cb->id_clients)->where('id_campers', $cb->id_campers)->first();
        if ($bookmark) {
            $b = CamperBookmark::find($bookmark->id);
            $b->delete();
        } else {
            $cb->save();
        }

    }

    public function removeFromBookMark($id)
    {
        $b = CamperBookmark::find($id);
        if ($b != null) {
            $b->delete();
        }

        return redirect(route('frontend.clients.bookmark'));
    }
}
