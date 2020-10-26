<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FContactController extends Controller
{
    //
    public function index()
    {

        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.contact.index')->with('categories', $categories);
    }

    public function terms()
    {

        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.helpLinks.terms')->with('categories', $categories);
    }

    public function disclaimer()
    {

        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.helpLinks.disclaimer')->with('categories', $categories);
    }

    public function imprint()
    {

        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.helpLinks.imprint')->with('categories', $categories);
    }

    public function help()
    {

        $categories = DB::table('camper_categories')->paginate(10);

        return view('frontend.helpLinks.help')->with('categories', $categories);
    }

}
