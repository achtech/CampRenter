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
use Illuminate\Support\Facades\Session;
use Socialite;

class FClientController extends DefaultLoginController
{

    public function __construct()
    {
        // this my con
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'bail|unique:clients|required|email',
            'password' => 'bail|required|min:8',
        ]);
        $input = request()->except(['_token', '_method', 'action']);
        $client_mail = Client::where('email', $input['email'])->first();
        if ($client_mail == null) {
            $input['password'] = bcrypt($input['password']);
            $client = Client::create($input);
            Mail::to($client['email'])->send(new RegistrationMail($client));
            return view('frontend.auth.login');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function userUpdateClient(Request $request)
    {
        if (Controller::getConnectedClient() == null) {
            return redirect(route('frontend.login.client'));
        }
        $client = Controller::getConnectedClient();

        if ($client->staus == 1) {
            $client_status = 'Confirmed';
        } else {
            $client_status = 'Non Confirmed';
        }
        $avatars = Avatar::get();
        $avatarsIds = Avatar::pluck('id')->toArray();
        $input = request()->except(['_token', 'action']);
        if ($request->language) {
            $input['language'] = join(',', $request->language);
        }
        if ($request->where_you_see_us) {
            $input['where_you_see_us'] = join(',', $request->where_you_see_us);
        }
        $file = $request->file('photo');
        $cin = $request->file('image_national_id');
        $driving_licence_image = $request->file('driving_licence_image');
        if ($request->file('driving_licence_image') && $request->file('driving_licence_image')->getClientOriginalName()) {
            $input['driving_licence_image'] = $request->file('driving_licence_image')->getClientOriginalName();
            $driving_licence_image->move(base_path('public/images/clients'), $driving_licence_image->getClientOriginalName());
        }
        if ($request->file('image_national_id') && $request->file('image_national_id')->getClientOriginalName()) {
            $input['image_national_id'] = $request->file('image_national_id')->getClientOriginalName();
            $cin->move(base_path('public/images/clients'), $cin->getClientOriginalName());
        }
        if ($request->file('photo') && $request->file('photo')->getClientOriginalName()) {
            $input['photo'] = $request->file('photo')->getClientOriginalName();
            $file->move(base_path('public/images/clients'), $file->getClientOriginalName());
        };
        $client->update($input);

        Session::put('_clients', $client);

        return redirect(route('clients.user.profile'));
    }

    public function changePassword(Request $request)
    {
        $client = Controller::getConnectedClient();
        if ($client == null) {
            return redirect(route('frontend.login.client'));
        }
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
        $campers = DB::table('campers')->where('is_confirmed', 1)->get();
        $blogs = DB::table('blogs')->orderBy('created_at', 'desc')->get();
        return view('frontend.auth.register')->with('blogs', $blogs)->with('campers', $campers);
    }

    public function ShowResetPassword(Request $request)
    {
        $campers = DB::table('campers')->where('is_confirmed', 1)->get();
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
