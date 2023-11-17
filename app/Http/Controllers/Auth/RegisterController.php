<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\UserRegistrationNotification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $Users = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verify_token' => Str::random(60),
        ]);

        Notification::route('mail',$Users->email)
                ->notify(new UserRegistrationNotification($Users));
        return $Users;
    }
    public function verifyEmailFirst()
    {
        return view('auth.verify');
    }
    public function verifyEmail($email, $verify_token)
    {
        $user = User::where(['email' => $email, 'verify_token' => $verify_token])->first();

        if ($user) {
            //User::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['status'=>'1','verifyToken'=>NULL,'email_verified_at'=>now()]);
            //return view('auth.login');
            //return redirect('/verifikasi-auth')->with(['success' => 'Aktifasi Akun Berhasil']);
            return view('frontend.verify');
        } else {
            return redirect('/login')->with(['error' => 'Tautan Aktifasi Akun Anda tidak ditemukan']);
        }
    }
}
