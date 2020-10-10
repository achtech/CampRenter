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
    public function index(Request $request)
    {
        $datas = DB::table('v_bookings_details')->get();
        $datasClients = DB::table('clients')->get();
        return view('booking.index')->with('renter', '')->with('datas', $datas)->with('datasClients', $datasClients);
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
        $data = DB::table('v_bookings_details')->Where('id',$id)->first();
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
        $input = request()->except(['_token', '_method', 'action']);
        $input['created_by']=auth()->user()->id;
        $input['updated_by']=auth()->user()->id;
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
        $input = request()->except(['_token', '_method', 'action']);
        $input['updated_by']=auth()->user()->id;
        $data = Booking::where('id', $id)->update($input);
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
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date'); 
        $date1 = Carbon::parse($start_date)->format('yy-m-d');
        $date2 = Carbon::parse($end_date)->format('yy-m-d');
        $renter = $request->get('renterId');
        $datas = DB::table('v_bookings_details');
        if(!empty($renter) && $renter != 'Choose'){
            $datas = $datas->Where('renter_id',$renter);
        }
        if(!empty($start_date)){
            $datas = $datas->whereDate('start_date','>=', $date1);
        }
        if(!empty($end_date)){
            $datas = $datas->whereDate('end_date','<=', $date2);
        }
        $datas = $datas->get();        
        return view('booking.index')
            ->with('datas', $datas)
            ->with('start_date',$start_date)
            ->with('end_date',$end_date)
            ->with('renter',$renter)
            ->with('datasClients', $datasClients);
    }
    public function chat($id)
    {
        $dataMessOwner = DB::table('v_chats_bookings')
            ->Where('id_bookings',$id)
            ->WhereNotNull('id_owner')
            ->orderBy('ordre_message','asc')->get();
        $dataMessRenter = DB::table('v_chats_bookings')
            ->Where('id_bookings',$id)
            ->WhereNotNull('id_renter')
            ->orderBy('ordre_message','asc')->get();
        $datas = DB::table('v_bookings_details')->get();
        $datasClients = DB::table('clients')->get();
        if (empty($dataMessOwner) && empty($dataMessRenter) ) {
            return redirect(route('booking.index'));
        }
        return view('booking.chat')->with('dataMessOwner', $dataMessOwner)->with('dataMessRenter', $dataMessRenter)
        ->with('bookingId', $id)
        ->with('datas', $datas)
        ->with('datasClients', $datasClients);
    }

}
