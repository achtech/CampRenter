<?php

namespace App\Http\Controllers;

  
 
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class BookingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datas = DB::table('bookingdetails')->get();
        $datasClients = DB::table('clients')->get();
        return view('booking.index')->with('datas', $datas)->with('datasClients', $datasClients);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Booking.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Booking::find($id);
        if (empty($data)) {
            return redirect(route('booking.index'));
        }
        return view('booking.show')->with('data', $data);

    }
    public function detail($id)
    {
        $data = DB::table('bookingdetails')->Where('id',$id)->first();
        $totalPrice = $data-> price_per_day * $data-> bookingDay;
        if (empty($data)) {
            return redirect(route('booking.index'));
        }
        return view('booking.show')->with('data', $data)->with('totalPrice',$totalPrice);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $data = Booking::create($input);
        return redirect(route('booking.index'))->with('success', 'Item added succesfully');
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
        $data = Booking::find($id);
        if (empty($data)) {
            return redirect(route('booking.index'));
        }
        $data = Booking::where('id', $id)->update(request()->except(['_token', '_method']));
        return redirect(route('booking.index'))->with('success', 'Item Updated succesfully');
    }

    //

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Booking::find($id);
        if (empty($data)) {
            return redirect(route('booking.index'));
        }
        $data->delete();
        return redirect(route('booking.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $date1,$date2
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        
        $datasClients = DB::table('clients')->get();
        $dateFrom = $request->get('dateFrom');
        $dateTo = $request->get('dateTo'); 
        $date1 = Carbon::parse($dateFrom)->format('yy-m-d');
        $date2 = Carbon::parse($dateTo)->format('yy-m-d');
        $owner = $request->get('ownerId');
        $datas = DB::table('bookingdetails')->Where('client_id',$owner)
        ->orWhere(function ($q) use ($date1,$date2) {
            $q->where('dateFrom','>=', $date1)
                ->where('dateTo', '<=',$date2);
        })->get();

        return view('booking.index')
            ->with('datas', $datas)
            ->with('dateFrom',$dateFrom)
            ->with('dateTo',$dateTo)
            ->with('datasClients', $datasClients);
    }
    public function message($id)
    {
        $data = DB::table('bookingdetails')->Where('id',$id)->first();
        if (empty($data)) {
            return redirect(route('booking.index'));
        }
        return view('booking.message')->with('data', $data);
    }
}
