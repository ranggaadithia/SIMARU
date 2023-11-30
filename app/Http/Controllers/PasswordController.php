<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'confirm_password' => ['required'],
        ]);

        $user = Auth::user();

        if ($request->confirm_password !== $request->new_password) {
            return back()->withErrors([
                'confirm_password' => 'Konfirmasi password tidak cocok.',
            ]);
        }

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => bcrypt($request->new_password),
            ]);

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login')->with('success', 'Password berhasil diubah, silahkan login kembali.');
        }

        return back()->withErrors([
            'current_password' => 'Password saat ini tidak cocok.',
        ]);
    }
}
