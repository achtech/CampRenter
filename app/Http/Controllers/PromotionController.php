<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
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
        $datas = DB::table('promotions')->orderBy('status', 'desc')->paginate(10);
        $dataPromoActivate = Promotion::where('status', 1)->first();
        return view('promotion.index')->with('datas', $datas)
            ->with('dataPromoActivate', $dataPromoActivate);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotion.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('promotion.index'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = request()->except(['_token', 'action', '_method']);
        $input['created_by'] = auth()->user()->id;
        $input['updated_by'] = auth()->user()->id;
        $input['status'] = 0;
        $data = Promotion::create($input);
        return redirect(route('promotion.index'))->with('success', 'Item added succesfully');
    }

    public function activate($id)
    {
        $affected = Promotion::where('status', '=', 1)->update(array('status' => 0));
        $affected = Promotion::find($id)->update(array('status' => 1));
        return redirect(route('promotion.index'))->with('success', 'Item added succesfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Promotion::find($id);
        return view('promotion.edit', ['id' => 1])->with('data', $data);

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
        $data = Promotion::find($id);
        if (empty($data)) {
            return redirect(route('promotion.index'));
        }
        $input = request()->except(['_token', '_method', 'action']);
        $input['updated_by'] = auth()->user()->id;
        $data = Promotion::where('id', $id)->update($input);
        return redirect(route('promotion.index'))->with('success', 'Item Updated succesfully');
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
        $data = Promotion::find($request->id);
        if (empty($data)) {
            return redirect(route('promotion.index'));
        }
        $data->delete();
        return redirect(route('promotion.index'));
    }
}
