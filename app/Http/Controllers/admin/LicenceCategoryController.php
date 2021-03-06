<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\LicenceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LicenceCategoryController extends Controller
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
            $datas = LicenceCategory::where(app()->getLocale() == 'de' ? 'label_de' : (app()->getLocale() == 'en' ? 'label_en' : 'label_fr'), 'like', '%' . $search . '%')->paginate(10);
        } else {
            $datas = LicenceCategory::paginate(10);
        }
        return view('admin.licenceCategory.index')->with('datas', $datas)->with('search', $search);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.licenceCategory.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('licenceCategory.index'));
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
        $data = LicenceCategory::create($input);
        return redirect(route('licenceCategory.index'))->with('success', 'Item added succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = LicenceCategory::find($id);
        return view('admin.licenceCategory.edit', ['id' => 1])
            ->with('data', $data);
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
        $data = LicenceCategory::find($id);
        if (empty($data)) {
            return redirect(route('licenceCategory.index'));
        }
        $input = request()->except(['_token', '_method', 'action']);
        $input['updated_by'] = auth()->user()->id;
        $data = LicenceCategory::where('id', $id)->update($input);
        return redirect(route('licenceCategory.index'))->with('success', 'Item Updated succesfully');
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
        $data = LicenceCategory::find($request->id);
        if (empty($data)) {
            return redirect(route('licenceCategory.index'));
        }
        $data->delete();
        return redirect(route('licenceCategory.index'));
    }

    public static function getLabel($table, $id)
    {
        $data = DB::table($table)->find($id);
        return (app()->getLocale() == 'de' ? $data->label_de : (app()->getLocale() == 'en' ? $data->label_en : $data->label_fr));
    }
}
