<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberProfileController extends Controller
{
    public function edit()
    {
        $member = auth()->guard('member')->user();

        return view('member.edit', compact('member'));
    }

    public function update(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:members,email,' . auth()->guard('member')->id(),
        'password' => 'nullable|string|min:8|confirmed',
        'whatsapp_number' => 'required|string|max:15|regex:/^[0-9+]*$/',
        'address' => 'required|string|max:500',
    ]);

    // Ambil data member yang login
    $member = auth()->guard('member')->user();

    // Memastikan $member adalah objek Eloquent Member
    if ($member instanceof \App\Models\Member) {
        // Update data member menggunakan save()
        $member->name = $request->name;
        $member->email = $request->email;
        $member->whatsapp_number = $request->whatsapp_number;
        $member->address = $request->address;

        // Update password jika diisi
        if ($request->filled('password')) {
            $member->password = bcrypt($request->password);
        }

        // Simpan perubahan ke database
        $member->save();  // Menyimpan perubahan ke database

        // Redirect dengan pesan sukses
        return redirect()->route('member.edit')->with('success', 'Profile updated successfully.');
    } else {
        // Jika member tidak ditemukan
        return redirect()->back()->with('error', 'User not found.');
    }
}

}