<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    protected $redirectTo = '/home';
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function create(array $data)
    {
        return Client::create([
            'email' => $data['email'],
            'client_name' => $data['client_name'],
            'client_last_name' => $data['client_last_name'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function doLogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $fieldType = 'email';
        dd(Auth::attempt(['email' => $input['email'], 'password' => md5($input['password'])]));
        //dd(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'])));
        if (auth()->attempt(array($fieldType => $input['email'], 'password' => md5($input['password'])))) {
            return redirect()->route('frontend.home.index');
        } else {
            return redirect()->route('frontend.index')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }
}
