<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi. Silahkan masukkan email Anda!',
            'password.required' => 'Password wajib diisi. Silahkan masukkan pesan Anda!',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/admin');
            } else if (Auth::user()->role == 'sponsor') {
                return redirect()->intended('/sponsor/sponsorship');
            } else if (Auth::user()->role == 'mahasiswa') {
                return redirect()->intended('/');
            }
        }
        throw ValidationException::withMessages(['fail' => 'Password atau email salah!']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // return redirect('/login');
        return redirect('/login')->with('success', 'Berhasil Keluar');
    }

    public function register()
    {
        $role = [];
        return view('auth.register.register', compact("role"));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        return redirect('/login')->with('success', 'Buat Akun Berhasil, Silahkan Login');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    // Redirect to Google's authentication page
    public function handleGoogleCallback()
    {
        // Google user object dari google
        try {
            $userFromGoogle = Socialite::driver('google')->user();
        } catch (InvalidStateException $e) {
            $userFromGoogle = Socialite::driver('google')->stateless()->user();
        }

        // Ambil user dari database berdasarkan google user id
        $userFromDatabase = User::where('email', $userFromGoogle->getEmail())->first();

        // Jika tidak ada user, maka buat user baru
        if (!$userFromDatabase) {
            // If the user does not exist, redirect to the registration page with Google user data
            return redirect()->route('register')->withInput([
                'name' => $userFromGoogle->getName(),
                'email' => $userFromGoogle->getEmail(),
            ])->with('error', 'Akun Google belum terdaftar, silahkan daftar terlebih dahulu');
        }

        // Jika ada user langsung login saja
        auth('web')->login($userFromDatabase);
        session()->regenerate();

        if (Auth::user()->role == 'admin') {
            return redirect()->intended('/admin')->with('success', 'Berhasil Login');
        } else if (Auth::user()->role == 'sponsor') {
            return redirect()->intended('/sponsor/sponsorship')->with('success', 'Berhasil Login');
        } else if (Auth::user()->role == 'mahasiswa') {
            return redirect()->intended('/')->with('success', 'Berhasil Login');
        }
        // return redirect('/');
    }

}
