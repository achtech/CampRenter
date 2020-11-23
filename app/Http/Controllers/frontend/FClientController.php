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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Socialite;

class FClientController extends DefaultLoginController
{
    public function __construct()
    {
        if (Controller::getConnectedClient() == null) {
            return view('frontend.login.client');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function store(Request $request)
    {
        $input = request()->except(['_token', '_method', 'action']);
        $input['password'] = bcrypt($input['password']);
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
        if ($client->staus == 1) {
            $client_status = 'Confirmed';
        } else {
            $client_status = 'Non Confirmed';
        }
        $avatars = Avatar::take(3)->get();
        $avatars_second = Avatar::skip(3)->take(3)->get();
        $avatars_third = Avatar::skip(6)->take(3)->get();
        $input = request()->except(['_token', 'action']);
        $file = $request->file('photo');
        $cin = $request->file('image_national_id');
        $driving_licence_image = $request->file('driving_licence_image');
        if ($request->file('driving_licence_image') && $request->file('driving_licence_image')->getClientOriginalName()) {
            $input['driving_licence_image'] = $request->file('driving_licence_image')->getClientOriginalName();
            $driving_licence_image->move(base_path('public\images\clients'), $driving_licence_image->getClientOriginalName());
        }
        if ($request->file('image_national_id') && $request->file('image_national_id')->getClientOriginalName()) {
            $input['image_national_id'] = $request->file('image_national_id')->getClientOriginalName();
            $cin->move(base_path('public\images\clients'), $cin->getClientOriginalName());
        }
        if ($request->file('photo') && $request->file('photo')->getClientOriginalName()) {
            $input['photo'] = $request->file('photo')->getClientOriginalName();
            $file->move(base_path('public\images\clients'), $file->getClientOriginalName());
        };
        if ($input['id_avatars'] != null) {
            $selected_avatars = Avatar::where('image', $input['id_avatars'])->first();
            $input['id_avatars'] = $selected_avatars->id;
        }
        $client->update($input);
        return view('frontend.clients.user.index')
            ->with('client', $client)
            ->with('avatars', $avatars)
            ->with('avatars_second', $avatars_second)
            ->with('avatars_third', $avatars_third)
            ->with('client_status', $client_status)
            ->with('success', 'Profile Updated Successuflly');
    }
    public function changePassword(Request $request)
    {
        $client = Controller::getConnectedClient();
        $passsword = $request->password ?? '';
        $new_passsword = $request->new_password ?? '';
        $confirmed_password = $request->confirmed_password ?? '';
        if (Hash::check($request->password, $client->password)) {
            if ($new_passsword == $confirmed_password) {
                $client->password = bcrypt($new_passsword);
                $client->save();
            } else {
                return redirect()->back()->with('danger', __('front.unsimilar_password'));
            }
        } else {
            return redirect()->back()->with('warning', __('front.invalid_current_password'));
        }
        return redirect(route('clients.user.profile'))->with('success', __('front.profile_updated'));
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
