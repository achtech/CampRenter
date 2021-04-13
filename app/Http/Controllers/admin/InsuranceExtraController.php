<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceExtra;
use Illuminate\Http\Request;

class InsuranceExtraController extends Controller
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
        $datas = InsuranceExtra::get();
        return view('admin.insuranceExtra.index')->with('datas', $datas);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.insuranceExtra.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('insuranceExtra.index'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $data = insuranceExtra::find($id);
        return redirect(route('insuranceExtra.index'))->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = insuranceExtra::find($id);
        return view('admin.insuranceExtra.edit')->with('data', $data);
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
        $data = insuranceExtra::find($id);
        if (empty($data)) {
            return redirect(route('insuranceExtra.index'));
        }
        $input = request()->except(['_token', '_method', 'action']);
        $input['default_extra'] = $request->default_extra == 1 ? 1 : 0;
        $data = insuranceExtra::where('id', $id)->update($input);
        return redirect(route('insuranceExtra.index'))->with('success', 'Item Updated succesfully');
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
        $data = InsuranceExtra::find($request->id);
        if (empty($data)) {
            return redirect(route('insuranceExtra.index'));
        }
        $data->delete();
        return redirect(route('insuranceExtra.index'));
    }
}
