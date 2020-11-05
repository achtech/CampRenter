<?php

namespace App\Http\Controllers\frontend;

use App\Mail\registrationEmail;
use App\Models\Client;
use Dotenv\Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Socialite;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordEmail;
use App\Mail\RegistrationMail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

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
                    'password' => encrypt($client->password)
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

    public function show($id)
    {
        return view('frontend.client.show');
    }
    public function edit(Request $request)
    {
        $url = $request->fullUrl();
        $searched_id = substr($url, strpos($url, "?") + 1);
        $id = str_replace("=", "", $searched_id);
        $categories = DB::table('camper_categories')->get();
        return view('frontend.client.edit')->with('categories', $categories)
            ->with('client_id', $id);
    }
    public function resetPassword(Request $request)
    {
        $input = request()->except(['_token', '_method', 'action']);
        $client = Client::where('email', $input['email'])->first();
        $input['client_name'] = $client['client_name'];
        $input['client_last_name'] = $client['client_last_name'];
        $input['id'] = $client['id'];
        Mail::to($input['email'])->send(new ForgotPasswordEmail($input));
        return redirect()->route('frontend.client.index');
    }

    public function updateF(Request $request)
    {
        $id = $request->get('client_id');
        $password = $request->get('password');
        $confirmed_password = $request->get('confirmed');
        if ($password == $confirmed_password) {
            $client = Client::find($id);
            $encrypted_pass = md5($request->password);
            $client->update(['password' => $encrypted_pass]);
            $categories = DB::table('camper_categories')->paginate(10);
            return view('frontend.client.index')->with('categories', $categories);
        }
    }
    public function index(Request $request)
    {

        $categories = DB::table('camper_categories')->paginate(10);
        return view('frontend.client.index')->with('categories', $categories);
    }
}
