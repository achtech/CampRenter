<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Avatar;
use Illuminate\Http\Request;

class AvatarController extends Controller
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
            $datas = Avatar::where('picture', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $datas = Avatar::paginate(10);
        }
        return view('admin.avatar.index')->with('datas', $datas)->with('search', $search);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.avatar.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('avatar.index'));
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
            $file->move(base_path('public\assets\images\avatar'), $file->getClientOriginalName());
        } else {
            $input = request()->except(['_token', '_method', 'action', 'picture']);
        }
        $input['created_by'] = auth()->user()->id;
        $input['updated_by'] = auth()->user()->id;
        $data = Avatar::create($input);
        return redirect(route('avatar.index'))->with('success', 'Item added succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Avatar::find($id);
        return view('admin.avatar.edit')->with('data', $data);

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
        $data = Avatar::find($id);
        if (empty($data)) {
            return redirect(route('avatar.index'));
        }

        $file = $request->file('image');
        $input = request()->except(['_token', '_method', 'action']);
        if ($request->file('image') && $request->file('image')->getClientOriginalName()) {
            $input['image'] = $request->file('image')->getClientOriginalName();
            $file->move(base_path('public\assets\images\avatar'), $file->getClientOriginalName());
        } else {
            $input = request()->except(['_token', '_method', 'action', 'picture']);
        }
        $input['updated_by'] = auth()->user()->id;
        $data = Avatar::where('id', $id)->update($input);
        return redirect(route('avatar.index'))->with('success', 'Item Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Avatar::find($request->id);
        if (empty($data)) {
            return redirect(route('avatar.index'));
        }
        $data->delete();
        return redirect(route('avatar.index'));
    }
}
