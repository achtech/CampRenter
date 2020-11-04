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
        $this->middleware('guest:client')->except('logout');
    }

    public function doLogin(Request $request)
    {

        $credentials = [
            'email' => $request['email'],
            'password' => md5($request['password']),
        ];
        //dd($credentials);
        //dd($request['email'] . '' . $request['password']);
        //  dd(Auth::attempt(array('email' => $request['email'], 'password' => $request['password'])));

        dd(Auth::attempt(array([
            'email' => 'inassekaram@gmail.com',
            'password' => '123456',
        ])));
        dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return 'Failure';
    }
    protected function guard()
    {
        return Auth::guard('client');
    }
}
