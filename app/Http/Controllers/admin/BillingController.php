<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Billing;
use App\Models\BillingBookings;
use App\Models\Client;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

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
            ->select('billings.id as id', 'billings.id', 'billings.iban', 'billings.billings_methods', 'billings.total', 'billings.status', 'billings.payment_date', 'billings.id_clients', 'clients.client_name', 'clients.client_last_name')
            ->get();
        return view('admin.billing.index')
            ->with('datas', $datas)
            ->with('clients', $clients)
            ->with('todayDate', $todayDate)
            ->with('renter', '')
            ->with('payed', '')
            ->with('notPayed', '');
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
        return view('admin.billing.billing_bookings')
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
        $xml_file_name = 'billings.xml';
        $first_element = $dom->createElement('Document');
        $first_element->setAttribute("xmlns", "http://www.six-interbank-clearing.com/de/pain.001.001.03.ch.02.xsd");
        $first_element->setAttribute("xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance");
        $first_element->setAttribute("xmlns:schemaLocation", "http://www.six-interbank-clearing.com/de/pain.001.001.03.ch.02.xsd");
        $dom->appendChild($first_element);
        if ($datas->count() > 0) {
            foreach ($datas as $elem) {
                $root = $dom->createElement('CstmrCdtTrfInitn');
                $first_element->appendChild($root);
                $node = $dom->createElement('GrpHdr');
                $child_node_title = $dom->createElement('MsgId', '7aeb9c4d264990e6fefc96affed9cd1b');
                $node->appendChild($child_node_title);
                $child_node_year = $dom->createElement('CreDtTm', 'tets');
                $node->appendChild($child_node_year);
                $child_node_genre = $dom->createElement('NbOfTxs', 1);
                $node->appendChild($child_node_genre);
                $child_node_ratings = $dom->createElement('CtrlSum', 14.9);
                $node->appendChild($child_node_ratings);
                $child_node_ratings = $dom->createElement('InitgPty');
                $child_node_title = $dom->createElement('Nm', $elem->client_name . ' ' . $elem->client_last_name);
                $child_node_ratings->appendChild($child_node_title);
                $child_node_title = $dom->createElement('CtctDtls');
                $child_node_titl = $dom->createElement('Nm', 'bexio');
                $child_node_title->appendChild($child_node_titl);
                $child_node_titl = $dom->createElement('Othr', '1.0.0');
                $child_node_title->appendChild($child_node_titl);
                $child_node_ratings->appendChild($child_node_title);
                $node->appendChild($child_node_ratings);
                $root->appendChild($node);
                //Second Element
                $second_element = $dom->createElement('PmtInf');
                $second_element_node = $dom->createElement('PmtInfId', 'Webgorilla GmbH');
                $second_element->appendChild($second_element_node);
                $second_element_node = $dom->createElement('PmtMtd', 'TRF');
                $second_element->appendChild($second_element_node);
                $second_element_node = $dom->createElement('BtchBookg', 'false');
                $second_element->appendChild($second_element_node);
                $second_element_node = $dom->createElement('ReqdExctnDt', '2020-10-12');
                $second_element->appendChild($second_element_node);

                $second_element_root = $dom->createElement('Dbtr');
                $second_element->appendChild($second_element_root);
                $second_element_node_db = $dom->createElement('Nm', 'Webgorilla GmbH');
                $second_element_root->appendChild($second_element_node_db);
                $second_element_root = $dom->createElement('DbtrAcct');
                $second_element->appendChild($second_element_root);
                $second_element_node_id = $dom->createElement('Id');
                $second_element_root->appendChild($second_element_node_id);
                $second_element_node_db = $dom->createElement('IBAN', $elem->iban);
                $second_element_node_id->appendChild($second_element_node_db);

                //Third Element
                $third_element = $dom->createElement('DbtrAgt');
                $second_element->appendChild($third_element);
                $third_element_node_id = $dom->createElement('FinInstnId');
                $third_element->appendChild($third_element_node_id);
                $third_element_bic = $dom->createElement('BIC', 'POFICHBEXXX');
                $third_element_node_id->appendChild($third_element_bic);
                $third_element = $dom->createElement('CdtTrfTxInf');
                $second_element->appendChild($third_element);
                $third_element_node_id = $dom->createElement('PmtId');
                $third_element->appendChild($third_element_node_id);
                $third_element_instr_id = $dom->createElement('InstrId', '5f6df097c5fc95.97866708');
                $third_element_node_id->appendChild($third_element_instr_id);
                $third_element_end = $dom->createElement('EndToEndId', '5f6df097c5fc95.97866708');
                $third_element_node_id->appendChild($third_element_end);
                $third_element->appendChild($third_element_node_id);
                $third_element_node_pmt = $dom->createElement('PmtTpInf');
                $third_element->appendChild($third_element_node_pmt);
                $third_element_lcl = $dom->createElement('LclInstrm');
                $third_element_node_pmt->appendChild($third_element_lcl);
                $third_element_prtry = $dom->createElement('Prtry', 'CH01');
                $third_element_lcl->appendChild($third_element_prtry);
                $third_element_node_amount = $dom->createElement('Amt');
                $third_element->appendChild($third_element_node_amount);
                $third_element_instd_amnt = $dom->createElement('InstdAmt', $elem->total);
                $third_element_node_amount->appendChild($third_element_instd_amnt);
                $third_element_instd_amnt->setAttribute("Ccy", "CHF");
                $third_element_cdtr = $dom->createElement('Cdtr');
                $third_element->appendChild($third_element_cdtr);
                $third_element_name = $dom->createElement('Nm', 'Cyon GmbH');
                $third_element_cdtr->appendChild($third_element_name);
                $third_element_adr = $dom->createElement('PstlAdr');
                $third_element_cdtr->appendChild($third_element_adr);
                $third_element_city = $dom->createElement('Ctry', 'CH');
                $third_element_adr->appendChild($third_element_city);
                $third_element_adrline = $dom->createElement('AdrLine', 'Brunngässlein 12');
                $third_element_adr->appendChild($third_element_adrline);
                $third_element_adrline = $dom->createElement('AdrLine', '4052, Basel');
                $third_element_adr->appendChild($third_element_adrline);
                $third_element_cdtr_acct = $dom->createElement('CdtrAcct');
                $third_element->appendChild($third_element_cdtr_acct);
                $third_element_id = $dom->createElement('Id');
                $third_element_cdtr_acct->appendChild($third_element_id);
                $third_element_other = $dom->createElement('Othr');
                $third_element_id->appendChild($third_element_other);
                $third_element_other_id = $dom->createElement('Id', '010575181');
                $third_element_other->appendChild($third_element_other_id);
                $third_element_rmtinf = $dom->createElement('RmtInf');
                $third_element->appendChild($third_element_rmtinf);
                $third_element_strd = $dom->createElement('Strd');
                $third_element_rmtinf->appendChild($third_element_strd);
                $third_element_cdtr_ref = $dom->createElement('CdtrRefInf');
                $third_element_strd->appendChild($third_element_cdtr_ref);
                $third_element_ref = $dom->createElement('Ref', '000001987972000000017179312');
                $third_element_cdtr_ref->appendChild($third_element_ref);
                $root->appendChild($second_element);
                $dom->save($xml_file_name);
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
        }
    }

    public function filter(Request $request)
    {
        $todayDate = date("Y-m-d");
        $clients = Client::all();
        $startDate = $request->start_date ?? '';
        $end_date = $request->end_date ?? '';
        $payed = $request->payed ?? '';
        $notPayed = $request->notPayed ?? '';
        $client = $request->ownerId ?? '';
        Session::put('startDate', $startDate);
        Session::put('end_date', $end_date);
        Session::put('payed', $payed);
        Session::put('notPayed', $notPayed);
        Session::put('client', $client);
        $datas = DB::table('billings')->join('clients', 'billings.id_clients', '=', 'clients.id')
            ->select('billings.id', 'billings.status', 'billings.total', 'billings.payment_date', 'clients.client_name', 'clients.client_last_name');
        if (!empty($startDate)) {
            $datas = $datas->whereDate('payment_date', '>=', $startDate);
        }
        if (!empty($endDate)) {
            $datas = $datas->whereDate('payment_date', '<=', $endDate);
        }
        $status = ((empty($payed) && empty($notPayed)) || (!empty($payed) && !empty($notPayed))) ? '' : (!empty($payed) ? 1 : 2);
        if (!empty($status)) {
            $datas = $datas->where('billings.status', $status == 2 ? 0 : 1);
        }
        if (!empty($client) && $client != '0') {
            $datas = $datas->where('billings.id_clients', $client);
        }
        $datas = $datas->get();
        return view('admin.billing.index')
            ->with('datas', $datas)
            ->with('clients', $clients)
            ->with('payed', $payed)
            ->with('notPayed', $notPayed)
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
        return view('admin.billing.create');
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
