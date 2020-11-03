<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\CamperSubCategory;
use App\Models\CamperCategory;
use Illuminate\Http\Request;

class CamperSubCategoryController extends Controller
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
        $datas = CamperSubCategory::paginate(10);
        return view('admin.camperSubCategory.index')->with('datas', $datas);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $camperCategories = CamperCategory::all()->pluck(app()->getLocale() == 'de' ? 'label_de' : (app()->getLocale() == 'en' ? 'label_en' : 'label_fr'), 'id');
        return view('admin.camperSubCategory.create')->with('camperCategories',$camperCategories);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('camperSubCategory.index'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $input = request()->except(['_token', '_method', 'action']);
        if ($request->file('image') && $request->file('image')->getClientOriginalName()) {
            $input['image'] = $request->file('image')->getClientOriginalName();
            $file->move(base_path('public\images\camper_categories'), $file->getClientOriginalName());
        } else {
            $input = request()->except(['_token', '_method', 'action', 'picture']);
        }
        $input['created_by']=auth()->user()->id;
        $input['updated_by']=auth()->user()->id;
        $data = CamperSubCategory::create($input);
        return redirect(route('camperSubCategory.index'))->with('success', 'Item added succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camperCategories = CamperCategory::all()->pluck(app()->getLocale() == 'de' ? 'label_de' : (app()->getLocale() == 'en' ? 'label_en' : 'label_fr'), 'id');

        $data = CamperSubCategory::find($id);
        return view('admin.camperSubCategory.edit', ['id' => 1])->with('data', $data)->with('camperCategories',$camperCategories);
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
        $data = CamperSubCategory::find($id);
        if (empty($data)) {
            return redirect(route('camperSubCategory.index'));
        }
        $file = $request->file('image');
        $input = request()->except(['_token', '_method', 'action']);
        if ($request->file('image') && $request->file('image')->getClientOriginalName()) {
            $input['image'] = $request->file('image')->getClientOriginalName();
            $file->move(base_path('public\images\camper_categories'), $file->getClientOriginalName());
        } else {
            $input = request()->except(['_token', '_method', 'action', 'picture']);
        }
        $input['updated_by']=auth()->user()->id;
        $data = CamperSubCategory::where('id', $id)->update($input);
        return redirect(route('camperSubCategory.index'))->with('success', 'Item Updated succesfully');
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
        $data = CamperSubCategory::find($request->id);
        if (empty($data)) {
            return redirect(route('camperSubCategory.index'));
        }
        $data->delete();
        return redirect(route('camperSubCategory.index'));
    }
}
