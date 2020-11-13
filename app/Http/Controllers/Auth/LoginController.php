<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:client')->except('logout');
    }

    public function showAdminLoginForm()
    {
        $campers = DB::table('campers')->where([
            ['is_confirmed', 1],
            ['availability', 2],
        ])->get();
        $blogs = DB::table('blogs')->orderBy('created_at', 'desc')->get();
        return view('frontend.auth.login')->with('blogs', $blogs)->with('campers', $campers);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'exists:clients|required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
