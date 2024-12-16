<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class MemberLoginController extends Controller
{
    /**
     * Menampilkan form login anggota.
     */
    public function create()
    {
        return view('auth.login-member');
    }

    /**
     * Memproses login anggota.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Autentikasi pengguna
        if (Auth::guard('member')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Redirect ke halaman utama setelah login berhasil
            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        // Gagal login, lempar error
        throw ValidationException::withMessages([
            'email' => 'Email atau password salah.',
        ]);
    }

    /**
     * Logout anggota.
     */
    public function destroy(Request $request)
    {
        Auth::guard('member')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.member')->with('success', 'Logout berhasil!');
    }
}
