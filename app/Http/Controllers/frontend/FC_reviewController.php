<?php

namespace App\Http\Controllers\frontend;

use DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FC_reviewController extends Controller
{
    public function index()
    {
        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.clients.review.index')->with('categories', $categories);
    }

}
