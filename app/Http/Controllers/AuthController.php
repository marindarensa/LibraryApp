<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login', [
            'layout' => false
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole(['user']);

        Auth::login($user);

        event(new Registered($user));

        return to_route('home')->with('success', 'Register successfull, please check your email for verification');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(\Request $request)
    {
        try {
            $user_google    = Socialite::driver('google')->user();

            $user           = User::where('email', $user_google->getEmail())->first();

            if ($user != null) {
                Auth::login($user, true);

                return to_route('home')->with('success', 'You have been logged in');
            } else {
                $user = User::Create([
                    'name'              => $user_google->getName(),
                    'email'             => $user_google->getEmail(),
                    'is_google_auth'    => 1,
                    'email_verified_at' => now()
                ]);
             
                $user->assignRole(['user']);
                
                Auth::login($user, true);

                return to_route('home')->with('success', 'Register successfully, You have been logged in');
            }
        } catch (\Exception $e) {
            return to_route('login');
        }
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return to_route('user.index')->with('success', 'Selamat datang ' . $user->name . ' di aplikasi kami');
        }

        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('home')->with('success', 'Kamu berhasil keluar dari aplikasi');
    }
}
