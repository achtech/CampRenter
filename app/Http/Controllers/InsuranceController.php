<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Models\CamperName;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;

class InsuranceController extends Controller
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
            $datas = Insurance::where('description', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $datas = Insurance::paginate(10);
        }
        return view('insurance.index')->with('datas', $datas)->with('search', $search);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO : IF ENG
        $camperNames = CamperName::all()->pluck('label_en', 'id');
        $insuranceCompanies = InsuranceCompany::all()->pluck('label_en', 'id');

        return view('insurance.create')                
            ->with('camperNames', $camperNames)
            ->with('insuranceCompanies', $insuranceCompanies);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('insurance.index'));
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
        $data = Insurance::create($input);
        return redirect(route('insurance.index'))->with('success', 'Item added succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Insurance::find($id);
        $camperNames = CamperName::all()->pluck('label_en', 'id');
        $insuranceCompanies = InsuranceCompany::all()->pluck('label_en', 'id');
        return view('insurance.edit', ['id' => 1])
        ->with('data', $data)
        ->with('camperNames', $camperNames)
        ->with('insuranceCompanies', $insuranceCompanies);
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
        $data = Insurance::find($id); 
        if (empty($data)) {
            return redirect(route('insurance.index'));
        }
        $input = request()->except(['_token', '_method', 'action']);
        $input['updated_by']=auth()->user()->id;
        $data = Insurance::where('id', $id)->update($input);
        return redirect(route('insurance.index'))->with('success', 'Item Updated succesfully');
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
        $data = Insurance::find($id);
        if (empty($data)) {
            return redirect(route('insurance.index'));
        }
        $data->delete();
        return redirect(route('insurance.index'));
    }

    public static function getLabel($table,$id){
        return DB::table($table)->find($id)->label_en;
    }
}
