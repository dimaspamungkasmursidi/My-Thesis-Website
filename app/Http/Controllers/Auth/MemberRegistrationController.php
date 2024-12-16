<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member; // Pastikan model Member sudah ada

class MemberRegistrationController extends Controller
{
    public function create()
    {
        // Menampilkan form registrasi anggota
        return view('auth.register-member');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan data anggota ke tabel 'members'
        Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Login otomatis setelah registrasi
        auth()->guard('member')->attempt($request->only('email', 'password'));

        // Redirect ke halaman utama
        return redirect()->route('home')->with('success', 'Registrasi berhasil!');
        // return redirect()->route('register.member')->with('success', 'Registration successful!');

    }
}
