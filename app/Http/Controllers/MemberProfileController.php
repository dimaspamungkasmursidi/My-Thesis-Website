<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberProfileController extends Controller
{
    public function edit()
    {
        $member = auth()->guard('member')->user();

        return view('member.edit', compact('member'));
    }

    public function update(Request $request)
    {
        $member = auth()->guard('member')->user();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
            'whatsapp_number' => 'required|string|max:15|regex:/^[0-9+]*$/', // Validasi nomor WA
            'address' => 'required|string|max:500',
        ]);

        $member= auth()->guard('member')->user();


        $member->name = $request->name;
        $member->email = $request->email;
        $member->whatsapp_number = $request->whatsapp_number;
        $member->address = $request->address;
        if ($request->password) {
            $member->password = bcrypt($request->password);
        }

        $request->member()->save();

        return redirect()->route('member.edit')->with('success', 'Profile updated successfully');
}

}
