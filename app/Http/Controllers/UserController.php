<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
            $datas = User::where('user_name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $datas = User::paginate(10);
        }
        return view('user.index')->with('datas', $datas)->with('search', $search);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //TODO : change user find by connected user
        $user = User::find(1);
        return view('user.profile')->with('user', $user);
    }

    public function profile()
    {
        //TODO : change user find by connected user
        $user = User::find(1);
        return view('user.profile')->with('data', $user);
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
        $input['password']="123456";
        $data = User::create($input);
        return redirect(route('user.index'))->with('success', 'Item added succesfully');
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
        $data = User::find($id);
        if (empty($data)) {
            return redirect(route('user.profile'));
        }
        $data = User::where('id', $id)->update(request()->except(['_token', '_method', 'action']));
        return redirect(route('user.profile'))->with('success', 'Item Updated succesfully');
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
        $data = User::find($id);
        if (empty($data)) {
            return redirect(route('user.index'));
        }
        $data->delete();
        return redirect(route('user.index'));
    }
}
