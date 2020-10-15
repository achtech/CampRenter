<?php

namespace App\Http\Controllers;



use App\Exports\BillingExport;
use App\Models\Avatars;
use App\Models\Billing;
use App\Models\Client;
use App\Models\Booking;
use App\Models\BillingBookings;
use DOMAttr;
use DOMDocument;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use SimpleXMLElement;

class BillingController extends Controller
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
        $todayDate = date("Y-m-d");
        $clients = Client::all();
        $datas = Billing::join('clients', 'billings.id_clients', '=', 'clients.id')
            ->select('Billings.id as id', 'Billings.id', 'Billings.iban', 'Billings.billings_methods', 'Billings.total', 'Billings.status', 'Billings.payment_date', 'Billings.id_clients', 'clients.client_name', 'clients.client_last_name')
            ->get();
        return view('billing.index')
            ->with('datas', $datas)
            ->with('clients', $clients)
            ->with('renter', '')
            ->with('todayDate', $todayDate)
            ->with('status', '');
    }

    public function bookings($id)
    {
        $todayDate = date("Y-m-d");
        $datas = DB::table('v_bookings_details')
            ->whereIn('id', function ($query) use ($id) {
                $query->select(['id_bookings'])
                    ->from((new BillingBookings)->getTable())
                    ->where('id_billings', $id);
            })->get();

        $clients = Client::all();
        return view('billing.billing_bookings')
            ->with('datas', $datas)
            ->with('clients', $clients)
            ->with('renter', '')
            ->with('todayDate', $todayDate);
    }
    public function export(Request $request)
    {
        $datas = Billing::join('clients', 'billings.id_clients', '=', 'clients.id')->where('status', 0)->get();
        $dom = new DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->xmlVersion = '1.0';
        $dom->formatOutput = true;
        $xml_file_name = 'movies_list.xml';
        if ($datas->count() > 0) {
            foreach ($datas as $elem) {
                $node = $dom->createElement('row');
                $child_node_title = $dom->createElement('Owner', $elem->client_name . ' ' . $elem->client_last_name);
                $node->appendChild($child_node_title);
                $child_node_title = $dom->createElement('IBAN', $elem->iban);
                $node->appendChild($child_node_title);
                $child_node_title = $dom->createElement('Amount', $elem->total);
                $node->appendChild($child_node_title);
                $dom->appendChild($node);
            }
        }

        $file = "billing.xml";
        $xml_file = fopen($file, "w") or die("Unable to open file!");
        $billingData = $dom->saveXML();
        fwrite($xml_file, $billingData);
        fclose($xml_file);

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        header("Content-Type: text/xml");
        readfile($file);
    }

    public function filter(Request $request)
    {
        $todayDate = date("Y-m-d");
        $clients = Client::all();
        $startDate = $request->start_date ?? '';
        $end_date = $request->end_date ?? '';
        $status = $request->status ?? '';
        $client = $request->ownerId ?? '';
        Session::put('startDate', $startDate);
        Session::put('end_date', $end_date);
        Session::put('status', $status);
        Session::put('client', $client);
        $datas = Billing::join('clients', 'billings.id_clients', '=', 'clients.id');
        if (!empty($startDate)) {
            $datas = $datas->whereDate('payment_date', '>=', $startDate);
        }
        if (!empty($endDate)) {
            $datas = $datas->whereDate('payment_date', '<=', $endDate);
        }
        if (!empty($status)) {
            $datas = $datas->where('billings.status', $status == 2 ? 1 : 0);
        }
        if (!empty($client) && $client != 'Choose') {
            $datas = $datas->where('billings.id_clients', $client);
        }
        $datas = $datas->get();
        return view('billing.index')
            ->with('datas', $datas)
            ->with('clients', $clients)
            ->with('status', $status)
            ->with('renter', $client)
            ->with('start_date', $startDate)
            ->with('end_date', $end_date)
            ->with('todayDate', $todayDate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('billing.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('billing.index'));
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
        $input['created_by'] = auth()->user()->id;
        $input['updated_by'] = auth()->user()->id;

        $data = Billing::create($input);
        return redirect(route('billing.index'))->with('success', 'Item added succesfully');
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
        $data = Billing::find($id);
        if (empty($data)) {
            return redirect(route('billing.index'));
        }
        $input = request()->except(['_token', '_method', 'action']);
        $input['updated_by'] = auth()->user()->id;
        $data = Billing::where('id', $id)->update($input);
        return redirect(route('billing.index'))->with('success', 'Item Updated succesfully');
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
        $data = Billing::find($id);
        if (empty($data)) {
            return redirect(route('billing.index'));
        }
        $data->delete();
        return redirect(route('billing.index'));
    }
}
