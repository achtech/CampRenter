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

class FClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function doLogin()
    {
        dd(1);
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:8'
        );
        // password has to be greater than 3 characters and can only be alphanumeric and);
        // checking all field
        $validator = Validator::make(Input::all(), $rules);
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            // create our user data for the authentication
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );
            // attempt to do the login
            if (Auth::attempt($userdata)) {
                // validation successful
                // do whatever you want on success
            } else {
                // validation not successful, send back to form
                return Redirect::to('checklogin');
            }
        }
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
                dd($newClient);
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

        Mail::to($client['email'])->send(new registrationEmail($client));
        return redirect(route('client.index'));
    }
    public function index()
    {
        return view('frontend.client.index');
    }
    public function show($id)
    {
        return view('frontend.client.show');
    }
}
