<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class FContactController extends Controller
{
    //
    public function index()
    {

        return view('frontend.contact.index');
    }

    public function terms()
    {

        return view('frontend.helpLinks.terms');
    }

    public function disclaimer()
    {

        return view('frontend.helpLinks.disclaimer');
    }

    public function imprint()
    {
        return view('frontend.helpLinks.imprint');
    }

    public function help()
    {

        return view('frontend.helpLinks.help');
    }

}
