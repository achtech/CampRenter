<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

  
 
use App\Models\Favoris;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;

class FavorisController extends Controller
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
            $datas = Favoris::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $datas = Favoris::paginate(10);
        }
        return view('admin.favoris.index')->with('datas', $datas)->with('search', $search);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.favoris.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('favori.index'));
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
        $data = Favoris::create($input);
        return redirect(route('favoris.index'))->with('success', 'Item added succesfully');
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
        $data = Favoris::find($id);
        if (empty($data)) {
            return redirect(route('favoris.index'));
        }
        $input = request()->except(['_token', '_method', 'action']);
        $input['updated_by']=auth()->user()->id;
        $data = Favoris::where('id', $id)->update($input);
        return redirect(route('favoris.index'))->with('success', 'Item Updated succesfully');
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
        $data = Favoris::find($id);
        if (empty($data)) {
            return redirect(route('favoris.index'));
        }
        $data->delete();
        return redirect(route('favoris.index'));
    }
}
