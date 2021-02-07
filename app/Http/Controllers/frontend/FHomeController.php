<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FHomeController extends Controller
{
    public function index()
    {
        $start_date_s = date("F d, Y");
        $end_date_s = date("F d, Y");
        $categories = DB::table('camper_categories')->get();
        $campers = DB::table('campers')->where('is_confirmed', 1)->get();
        $blogs = DB::table('blogs')->orderBy('created_at', 'desc')->get();
        return view('frontend.home.index')
            ->with('blogs', $blogs)
            ->with('categories', $categories)
            ->with('campers', $campers)
            ->with('start_date_s', $start_date_s)
            ->with('end_date_s', $end_date_s);
    }
    public static function getReviewsCount($id)
    {
        return DB::table('camper_reviews')->where('id_campers', $id)->count();
    }
    public static function getCamperRate($id)
    {
        $data = DB::table('v_rate_camper')->where('id_campers', $id)->first();
        return $data ? $data->rate : 0;
    }
    public static function getListings($id)
    {
        return $data = DB::table('campers')->where([
            ['id_camper_categories', $id],
            ['is_confirmed', 1],
        ])->count();
    }
}
