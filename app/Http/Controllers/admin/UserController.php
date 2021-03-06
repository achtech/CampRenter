<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\UpdateProfile;
use App\Models\Avatar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Hash;

class UserController extends Controller
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
            $datas = User::where('user_name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $datas = User::paginate(10);
        }
        $avatarsIds = Avatar::pluck('id')->toArray();
        return view('admin.user.index')->with('datas', $datas)->with('search', $search)->with('avatarsIds',$avatarsIds);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
        $user = User::find(auth()->user()->id);
        return view('admin.user.profile')->with('user', $user);
    }

    public function profile()
    {
        //TODO : change user find by connected user
        $user = User::find(auth()->user()->id);
        return view('admin.user.profile')->with('data', $user);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('picture');

        if($request->file('picture') && $request->file('picture')->getClientOriginalName()){
            $input = request()->except(['_token', '_method', 'action']);
            $input['picture'] = $request->file('picture')->getClientOriginalName();
            $file->move(base_path('public\assets\images\users'),$file->getClientOriginalName());
        } else {
            $input = request()->except(['_token', '_method', 'action', 'picture']);
        }
        $input['password']=bcrypt("123456");
        $input['created_by']=auth()->user()->id;
        $input['updated_by']=auth()->user()->id;

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
        $data = User::find($id);
        return view('admin.user.edit')->with('data', $data);
    }

    public function updateProfile(){
        $user = User::find(auth()->user()->id);
        return view('admin.user.updateProfile')->with('data', $user);
    }
    
    public function changePassword(){
        $user = User::find(auth()->user()->id);
        return view('admin.user.changePassword')->with('data', $user);
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
        $this->updateUser($request,$id);
        return redirect(route('user.index'))->with('success', 'Item Updated succesfully');
    }
    
    public function updateDataProfile(Request $request)
    {
        $this->updateUser($request,auth()->user()->id);
        return redirect(route('user.profile'))->with('success', 'Item Updated succesfully');
    }
    
    public function updatePassword(UpdateProfile $request)
    {
        $current = $request->old_password;
        $password = $request->password;
        $confirm = $request->password_confirmation;
        $data = User::find(auth()->user()->id);
        if (empty($data)) {
            return redirect(route('user.profile'));
        }
        if (!(Hash::check($current, auth()->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($current, $password) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        if($password!=$confirm){
            return redirect(route('user.profile'))->with('success', 'Item Updated succesfully');    
        }
        $input = request()->except(['_token', '_method', 'action','old_password','password_confirmation']);
        $input['password'] = bcrypt($password);
        $input['updated_by']=auth()->user()->id;
        $data = User::where('id', auth()->user()->id)->update($input);
        return redirect(route('user.profile'))->with('success', 'Item Updated succesfully');
    }

    private function updateUser($request, $id){
        $file = $request->file('picture');
        $data = User::find($id);
        if (empty($data)) {
            return redirect(route('user.index'));
        }
        if($request->file('picture') && $request->file('picture')->getClientOriginalName()){
            $input = request()->except(['_token', '_method', 'action']);
            $input['picture'] = $request->file('picture')->getClientOriginalName();
            $file->move(base_path('public\assets\images\users'),$file->getClientOriginalName());
        } else {
            $input = request()->except(['_token', '_method', 'action', 'picture']);
        }
        $input['updated_by']=auth()->user()->id;
        $data = User::where('id', $id)->update($input);
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
        $data->status = 0;
        $input['updated_by']=auth()->user()->id;
        $data = User::where('id', $id)->update($data);
        return redirect(route('user.index'));
    }
}
