<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        //$this->middleware('guest:client')->except('logout');
    }

    public function clientLogout()
    {
        session()->forget('_client');
        Auth::logout();
        return redirect(route('home.index'));
    }

    public function showAdminLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'exists:clients|required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            Session::put('_client', $request['email']);
            return redirect()->intended(route('home.index'));
        }

        $user = Client::where('email', '=', $request->input('email'))->first();

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'approve' => 'Wrong password',
            ]);
        }
    }
}
