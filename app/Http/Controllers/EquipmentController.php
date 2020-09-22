<?php

namespace App\Http\Controllers;

use App\AnneeScolaire;
use App\AnneesScolaire;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;

class EquipmentController extends Controller
{

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
            $datas = Equipment::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $datas = Equipment::paginate(10);
        }
        return view('equipment.index')->with('datas', $datas)->with('search', $search);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Equipment.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('equipment.index'));
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
        $data = Equipment::create($input);
        return redirect(route('equipment.index'))->with('success', 'Item added succesfully');
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
        $data = Equipment::find($id);
        if (empty($data)) {
            return redirect(route('equipment.index'));
        }
        $data = Equipment::where('id', $id)->update(request()->except(['_token', '_method']));
        return redirect(route('equipment.index'))->with('success', 'Item Updated succesfully');
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
        $data = Equipment::find($id);
        if (empty($data)) {
            return redirect(route('equipment.index'));
        }
        $data->delete();
        return redirect(route('equipment.index'));
    }
}
