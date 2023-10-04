<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        if ($request->password !== $request->confirm_pass) {
            return back()->withErrors([
                "password" => "password doesn't match",
            ])->onlyInput('password');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'phone_number' => 'required'
        ]);

        $validated['role'] = 'umum';

        User::create($validated);

        return redirect('/login')->with('success', 'Akun anda berhasil dibuat, silahkan login untuk melanjutkan');
    }
}
