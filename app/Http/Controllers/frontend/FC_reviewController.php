<?php

namespace App\Http\Controllers\frontend;

use DB;
use App\Http\Controllers\Controller;
use App\Models\CamperReview;
use Illuminate\Http\Request;

class FC_reviewController extends Controller
{
    public function index()
    {
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.clients.review.index')->with('categories', $categories);
    }

    public function addReview(Request $request){
        $input = request()->except(['_token', '_method']);
        $input['created_by']=1;
        $input['updated_by']=1;
        $data = CamperReview::create($input);
        return redirect(route('frontend.camper.detail',$request->id_campers))->with('success', 'Item added succesfully');
    }

    public function helpfulReview($id){
        $review = CamperReview::find($id);
        //TODO connext user must 
        $review->increment('helpfulReview');// increase one count
        //$review->decrement('helpfulReview');
        return redirect()->back();
    }

    public static function reviewCamperCount($id){
        return CamperReview::where('id_campers',$id)->count();
    }

    public static function rateCamper($id){
        $rateData = DB::table('v_rate_camper')->where('id_campers',$id)->first();
        return $rateData ? number_format($rateData->rate,1) : 0;
    }

}
