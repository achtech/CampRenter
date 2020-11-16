<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Message;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Message::paginate(10);
        return view('admin.message.index')->with('datas', $datas);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = Message::find($id);
        $datas->status = 1;
        $datas->update();
        if (empty($datas)) {
            return view('admin.message.index')->with('datas', $datas);
        }
        return view('admin.message.show')->with('datas', $datas)->with('messageId', $id);
    }
    public function sendEmail(Request $request)
    {
        $GLOBALS['from_email'] = $request->from_email;
        $GLOBALS['to_email'] = $request->to_email;
        $GLOBALS['subject'] = $request->subject;
        $datas = Message::where('email', $GLOBALS['to_email'])->first();
        Mail::raw($request->message, function ($message) {
            $message->from($GLOBALS['from_email'], 'Camper Team');
            $message->to($GLOBALS['to_email']);
            $message->subject($GLOBALS['subject']);
        });
        return view('admin.message.show')->with('datas', $datas)->with('messageId', $datas->id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    //

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request ? $request->id : 0;
        $data = Message::find($request->id);
        if (empty($data)) {
            return redirect(route('message.index'));
        }
        $data->delete();
        return redirect(route('message.index'));
    }
    public function sendEmailToClient($id)
    {
        $data = Message::find($id);
        return view('admin.message.send')
            ->with('data', $data);
    }
}
