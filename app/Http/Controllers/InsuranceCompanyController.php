<?php

namespace App\Http\Controllers;

use App\Models\InsuranceCompany;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;

class InsuranceCompanyController extends Controller
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
            $datas = InsuranceCompany::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $datas = InsuranceCompany::paginate(10);
        }
        return view('insuranceCompany.index')->with('datas', $datas)->with('search', $search);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('InsuranceCompany.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('insuranceCompany.index'));
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
        $data = InsuranceCompany::create($input);
        return redirect(route('insuranceCompany.index'))->with('success', 'Item added succesfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = InsuranceCompany::find($id);
        return view('insuranceCompany.edit')->with('data', $data);
 
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
        $data = InsuranceCompany::find($id);
        if (empty($data)) {
            return redirect(route('insuranceCompany.index'));
        }
        $data = InsuranceCompany::where('id', $id)->update(request()->except(['_token', '_method','action']));
        return redirect(route('insuranceCompany.index'))->with('success', 'Item Updated succesfully');
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
        $data = InsuranceCompany::find($id);
        if (empty($data)) {
            return redirect(route('insuranceCompany.index'));
        }
        $data->delete();
        return redirect(route('insuranceCompany.index'));
    }
}
