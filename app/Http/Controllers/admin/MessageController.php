<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Message;
use Mail;
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
    public function sendEmail()
    {
        $data = array('name' => "Our Code World");
        // Path or name to the blade template to be rendered
        $template_path = 'message.index';
        $datas = Message::paginate(10);
        Mail::send($template_path, $data, function ($message) {
            // Set the receiver and subject of the mail.
            $message->to('achraf.saloumi@exo-it.com', 'Receiver Name')->subject('Laravel HTML Mail');
            // Set the sender
            $message->from('noura.bouchbaat@exo-it.com', 'Our Code World');
        });
        $datas = Message::paginate(10);
        return view('admin.message.index')->with('datas', $datas);
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
        $id = $request ? $request->id: 0;
        $data = Message::find($request->id);
        if (empty($data)) {
            return redirect(route('message.index'));
        }
        $data->delete();
        return redirect(route('message.index'));

    }
}