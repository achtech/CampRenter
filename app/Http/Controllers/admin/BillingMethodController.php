<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

  
 
use App\Models\Avatars;
use App\Models\Billing;
use App\Models\BillingMethod;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;

class BillingMethodController extends Controller
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
        $search = '';
        if (isset($request) && null !== $request->get('search')) {
            $search = $request->get('search');
            $datas = BillingMethod::where('picture', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $datas = BillingMethod::paginate(10);
        }
        return view('admin.billingMethod.index')->with('datas', $datas)->with('search', $search);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.BillingMethod.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('billingMethod.index'));
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
        $data = BillingMethod::create($input);
        return redirect(route('billingMethod.index'))->with('success', 'Item added succesfully');
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
        $data = BillingMethod::find($id);
        if (empty($data)) {
            return redirect(route('billingMethod.index'));
        }
        $input = request()->except(['_token', '_method', 'action']);
        $input['updated_by']=auth()->user()->id;

        $data = BillingMethod::where('id', $id)->update($input);
        return redirect(route('billingMethod.index'))->with('success', 'Item Updated succesfully');
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
        $data = BillingMethod::find($id);
        if (empty($data)) {
            return redirect(route('billingMethod.index'));
        }
        $data->delete();
        return redirect(route('billingMethod.index'));
    }
}
