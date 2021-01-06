<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;

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
        $datas = InsuranceCompany::paginate(10);
        return view('admin.insuranceCompany.index')->with('datas', $datas);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.insuranceCompany.create');
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
        $file = $request->file('logo');
        $input = request()->except(['_token', '_method', 'action']);
        if ($request->file('logo') && $request->file('logo')->getClientOriginalName()) {
            $input['logo'] = $request->file('logo')->getClientOriginalName();
            $file->move(base_path('public/images/insuranceCompany'), $file->getClientOriginalName());
        } else {
            $input = request()->except(['_token', '_method', 'action', 'picture']);
        }
        $input['created_by'] = auth()->user()->id;
        $input['updated_by'] = auth()->user()->id;
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
        return view('admin.insuranceCompany.edit')->with('data', $data);
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
        $file = $request->file('logo');
        $input = request()->except(['_token', '_method', 'action']);
        if ($request->file('logo') && $request->file('logo')->getClientOriginalName()) {
            $input['logo'] = $request->file('logo')->getClientOriginalName();
            $file->move(base_path('public/images/insuranceCompany'), $file->getClientOriginalName());
        } else {
            $input = request()->except(['_token', '_method', 'action', 'picture']);
        }

        $input['updated_by'] = auth()->user()->id;
        $data = InsuranceCompany::where('id', $id)->update($input);
        return redirect(route('insuranceCompany.index'))->with('success', 'Item Updated succesfully');
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
        $data = InsuranceCompany::find($request->id);
        if (empty($data)) {
            return redirect(route('insuranceCompany.index'));
        }
        $data->delete();
        return redirect(route('insuranceCompany.index'));
    }
}
