<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            // Jika user sudah login, redirect ke halaman admin
            return redirect()->route('admin');
        } else {
            // Jika belum login, tampilkan form login
            return view('admin.auth.login', [
                'title' => 'Login'
            ]);
        }
    }

    public function auth_login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Jika input valid, coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->with([
            'error' => 'Terjadi kesalahan saat login, silahkan coba lagi.'
        ])->onlyInput('email');
    }

    public function logout()
    {
        // Logout user
        Auth::logout();
        return redirect()->route('login');
    }
}
