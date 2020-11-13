<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordEmail;
use App\Mail\RegistrationMail;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Socialite;

class FClientController extends DefaultLoginController
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest:client')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('client');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => md5($request['password']),
        ];
        dd(Auth::attempt(array([
            'email' => 'inassekaram@gmail.com',
            'password' => '123456',
        ])));
        //dd(Auth::guard('client')->attempt($credentials));
        dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return 'Failure';
    }

    public function doLogout()
    {
        Auth::logout(); // logging out user
        return Redirect::to('layout'); // redirection to login screen
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        dd(12);
        try {

            $client = Socialite::driver('facebook')->user();

            $finduser = Client::where('facebook_id', $client->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect('layout');
            } else {
                $newClient = Client::create([
                    'name' => $client->client_name,
                    'email' => $client->email,
                    'facebook_id' => $client->id,
                    'password' => encrypt($client->password),
                ]);

                Auth::login($newClient);

                return redirect(route('client.index'));
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function store(Request $request)
    {
        $input = request()->except(['_token', '_method', 'action']);
        $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
        $client = Client::create($input);
        Mail::to($client['email'])->send(new RegistrationMail($client));
        return redirect(route('frontend.client.index'));
    }
    public function completeRegistrationProfile(Request $request)
    {
        dd($request->all());
    }
    public function show($id)
    {
        return view('frontend.client.show');
    }
    public function edit(Request $request)
    {
        $url = $request->fullUrl();
        $searched_id = substr($url, strpos($url, "?") + 1);
        $id = str_replace("=", "", $searched_id);
        return view('frontend.client.edit')->with('client_id', $id);
    }
    public function ShowRegister()
    {
        $campers = DB::table('campers')->where([
            ['is_confirmed', 1],
            ['availability', 2],
        ])->get();
        $blogs = DB::table('blogs')->orderBy('created_at', 'desc')->get();
        return view('frontend.auth.register')->with('blogs', $blogs)->with('campers', $campers);
    }

    public function ShowResetPassword(Request $request)
    {
        $campers = DB::table('campers')->where([
            ['is_confirmed', 1],
            ['availability', 2],
        ])->get();
        $blogs = DB::table('blogs')->orderBy('created_at', 'desc')->get();
        return view('frontend.auth.passwords.reset')->with('blogs', $blogs)->with('campers', $campers);
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'exists:clients|required|email',
        ]);

        $input = request()->except(['_token', '_method', 'action']);
        $client = Client::where('email', $input['email'])->first();
        $input['client_name'] = $client['client_name'];
        $input['client_last_name'] = $client['client_last_name'];
        $input['id'] = $client['id'];
        Mail::to($input['email'])->send(new ForgotPasswordEmail($input));
        return redirect()->route('frontend.client.index');
    }

    public function updatePassword(Request $request)
    {
        $id = $request->get('client_id');
        $password = $request->get('password');
        $confirmed_password = $request->get('confirmed');
        if ($password == $confirmed_password) {
            $client = Client::find($id);
            $encrypted_pass = md5($request->password);
            $client->update(['password' => $encrypted_pass]);
            return view('frontend.client.index');
        }
    }

    public function index(Request $request)
    {

        return view('frontend.client.index');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        dd(12);
        try {

            $user = Socialite::driver('google')->user();

            $finduser = Client::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect('/home');
            } else {
                $newUser = Client::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                ]);

                Auth::login($newUser);

                return redirect()->back();
            }
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }
}
