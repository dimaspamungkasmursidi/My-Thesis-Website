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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'password' => 'required|string|confirmed|min:8',
            'whatsapp_number' => 'required|string|max:15|regex:/^[0-9+]*$/', // Validasi nomor WA
            'address' => 'required|string|max:500',
        ], [
            'whatsapp_number.required' => 'Nomor WhatsApp wajib diisi.',
            'whatsapp_number.regex' => 'Nomor WhatsApp hanya boleh mengandung angka dan tanda +.',
            'address.required' => 'Alamat wajib diisi.',
            'address.max' => 'Alamat maksimal 500 karakter.',
        ]);

        // Simpan data ke database
        Member::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'whatsapp_number' => $validated['whatsapp_number'],
            'address' => $validated['address'], // Tambahkan address
        ]);

        // Login otomatis setelah registrasi
        // auth()->guard('member')->attempt($request->only('email', 'password'));

        return redirect()->route('login.member')->with('status', 'Yeay, Pendaftaran berhasil! Tolong login dulu ya.');
    }
}

