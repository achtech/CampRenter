<?php

namespace App\Http\Controllers;

use App\AnneeScolaire;
use App\AnneesScolaire;
use App\Models\Commission;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;


class ComissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = '';
        /*if (isset($request) && null !== $request->get('search')) {
            $search = $request->get('search');
            $datas = Commission::where('start_date', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $datas = Commission::paginate(10);
        }*/
        $datas = Commission::paginate(10);
        $datasPromo = Promotion::paginate(10);
        return view('commission.index')->with('datas', $datas)->with('datasPromo', $datasPromo);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Commission.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('Commission.index'));
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
        $data = Commission::create($input);
        return redirect(route('commission.index'))->with('success', 'Item added succesfully');
    }

    public function storePromotion()
    {
        $input = $request->all();
        $data = Promotion::create($input);
        return redirect(route('commission.index'))->with('success', 'Item added succesfully');
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
        $data = Commission::find($id);
        if (empty($data)) {
            return redirect(route('commission.index'));
        }
        $data->delete();
        return redirect(route('commission.index'));
    }
}
