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
        if (Controller::getConnectedClient() == null) {
            return redirect(route('frontend.login.client'));
        }
        $client = Controller::getConnectedClient();
        $visitors = DB::table("v_review_camper_client")->where('id_renters', $client->id)->get();
        $owners = DB::table("v_review_camper_client")->where('id_owners', $client->id)->get();
        return view('frontend.clients.review.index')
            ->with('visitors', $visitors)
            ->with('owners', $owners);
    }

    public function addReview(Request $request)
    {
        if (Controller::getConnectedClient() == null) {
            return redirect(route('frontend.login.client'));
        }
        $client = Controller::getConnectedClient();
        $input = request()->except(['_token', '_method']);
        $input['created_by'] = $client->id;
        $data = CamperReview::create($input);
        return redirect(route('frontend.camper.detail', $request->id_campers))->with('success', 'Item added succesfully');
    }

    public function feedback($id)
    {
        $review = DB::table("v_review_camper_client")->where('id_review', $id)->first();
        return view('frontend.clients.review.feedback')
            ->with('review', $review);

    }

    public function editReview($id)
    {
        $review = DB::table("v_review_camper_client")->where('id_review', $id)->first();
        return view('frontend.clients.review.edit')
            ->with('review', $review);

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
