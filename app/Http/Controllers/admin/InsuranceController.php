<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CamperCategory;
use App\Models\Insurance;
use Illuminate\Http\Request;
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
        $datas = Insurance::orderBy('id_camper_categories')->get();
        return view('admin.insurance.index')->with('datas', $datas);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $camperCategories = CamperCategory::all()->pluck(app()->getLocale() == 'de' ? 'label_de' : (app()->getLocale() == 'en' ? 'label_en' : 'label_fr'), 'id');

        return view('admin.insurance.create')
            ->with('camperCategories', $camperCategories);
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
        $camperCategories = CamperCategory::all();
        
        return view('admin.insurance.edit')
            ->with('data', $data)
            ->with('camperCategories', $camperCategories);
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
    public function destroy(Request $request)
    {
        $data = Insurance::find($request->id);
        if (empty($data)) {
            return redirect(route('insurance.index'));
        }
        $data->delete();
        return redirect(route('insurance.index'));
    }

    public static function getName($table, $id)
    {
        return DB::table($table)->find($id)->name;
    }

    public static function getLabel($table, $id)
    {
        $data = DB::table($table)->find($id);
        return $data ? (app()->getLocale() == 'de' ? $data->label_de : (app()->getLocale() == 'en' ? $data->label_en : $data->label_fr)) : '';
    }
}
