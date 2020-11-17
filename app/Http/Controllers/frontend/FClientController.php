<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordEmail;
use App\Mail\RegistrationMail;
use App\Models\Avatar;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Socialite;

class FClientController extends DefaultLoginController
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        //$this->middleware('guest:client')->except('logout');
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

    public function store(Request $request)
    {
        $input = request()->except(['_token', '_method', 'action']);
        $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
        $client = Client::create($input);
        Mail::to($client['email'])->send(new RegistrationMail($client));
        $categories = DB::table('camper_categories')->paginate(10);
        $campers = DB::table('campers')->where([
            ['is_confirmed', 1],
            ['availability', 2],
        ])->get();
        $blogs = DB::table('blogs')->orderBy('created_at', 'desc')->get();
        return view('frontend.auth.login');
    }
    public function completeRegistrationProfile(Request $request)
    {
        $client = Controller::getConnectedClient();

        $input = request()->except(['_token', 'action']);
        //dd($input);
        // $input['password'] = md5($input['password']);
        // if ($input['password'] != $client->password) {
        //     return redirect()->back()->with('warning', __('front.invalid_current_password'));
        // }
        // if ($input['password'] == $client->password && $input['new_password'] != null && $input['confirmed_password'] != null) {
        //     if ($input['new_password'] == $input['confirmed_password']) {
        //         $input['new_password'] = md5($input['new_password']);
        //         $input['password'] = $input['new_password'];
        //     } else {
        //         return redirect()->back()->with('danger', __('front.unsimilar_password'));
        //     }
        // }
        //Storage::disk('public')->put('filename', $input['photo']);
        $file = request()->file('photo');
        dd($input);
        $file->store('toPath', ['disk' => 'public']);
        $client->update($input);
        return view('clients.user.profile')->with('client', $client)->with('avatars', $avatars);
        //return redirect(route('clients.user.profile'))->with('success', __('front.profile_updated'));
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
    public function showRegister()
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
        //dd(12);
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {

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
