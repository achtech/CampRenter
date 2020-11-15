<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CamperBookmark;
use DB;
use Auth;
class FC_bookmarkController extends Controller
{
    public function index()
    {
        return view('frontend.clients.bookmark.index');
    }

    public static function getBookmarkCamperCount($id){
        return DB::table('camper_bookmarks')->where('id_campers',$id)->get()->count();
    }

    public static function isBookmarked($id){
        $clientId = Auth::guard('client') && Auth::guard('client')->user() ? Auth::guard('client')->user()->id : 0;
        return DB::table('camper_bookmarks')->where('id_clients',$clientId)->where('id_campers',$id)->get()->count() >0; 
    }

    public function addOrRemove(Request $request){

        $cb  = new CamperBookmark();
        $cb->id_clients = Auth::guard('client') && Auth::guard('client')->user() ? Auth::guard('client')->user()->id : 0;
        $cb->id_campers = $request ? $request->camperid : 0;

        $bookmark = DB::table('camper_bookmarks')->where('id_clients',$cb->id_clients)->where('id_campers',$cb->id_campers)->first();
        if($bookmark){
            $b= CamperBookmark::find($bookmark->id);
            $b->delete();
        }
        else
            $cb->save(); 

    }
}
