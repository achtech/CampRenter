<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CamperReview;
use DB;
use Illuminate\Http\Request;

class FC_reviewController extends Controller
{
    public function index()
    {
        $client = Controller::getConnectedClient();
        if ($client != null) {
            $datas = DB::table("v_review_camper_client")->where('id_clients', $client->id)->first();
            $own_reviews = DB::table("v_review_camper_client")->where('created_by', $client->id)->first();
            return view('frontend.clients.review.index')
                ->with('datas', $datas)
                ->with('own_reviews', $own_reviews);
        } else {
            return view('frontend.clients.review.index');
        }

    }

    public function addReview(Request $request)
    {
        $client = Controller::getConnectedClient();
        $input = request()->except(['_token', '_method']);
        $input['created_by'] = $client->id;
        $data = CamperReview::create($input);
        return redirect(route('frontend.camper.detail', $request->id_campers))->with('success', 'Item added succesfully');
    }

    public function helpfulReview($id)
    {
        $review = CamperReview::find($id);
        //TODO connext user must
        $review->increment('helpfulReview'); // increase one count
        //$review->decrement('helpfulReview');
        return redirect()->back();
    }

    public static function reviewCamperCount($id)
    {
        return CamperReview::where('id_campers', $id)->count();
    }

    public static function rateCamper($id)
    {
        $rateData = DB::table('v_rate_camper')->where('id_campers', $id)->first();
        return $rateData ? number_format($rateData->rate, 1) : 0;
    }

}
