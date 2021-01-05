<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use DateTime;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        dd('ok');
        $date = new DateTime();
        $send_date = $date->format('Y-m-d H:i:s');
        $input = request()->except(['_token', '_method', 'action']);
        $input['send_date'] = $send_date;
        $input['status'] = 0;
        $message = Message::create($input);
        return view('frontend.contact.index');
    }
}
