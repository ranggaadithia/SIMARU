<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi data pengguna
        $validatedUser = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'phone_number' => 'required'
        ]);

        // Tambahkan peran pengguna
        $validatedUser['role'] = 'umum';

        // Simpan data ke tabel users
        $user = User::create($validatedUser);

        // Validasi data dosen
        $validatedDosen = $request->validate([
            'nip' => 'required|string|max:255',
            'nama_dosen' => 'required|string|max:255',
            'email_sso' => 'required|string|email|max:255',
            'pns_nonpns' => 'required|string|max:255',
            'status_ikatan_kerja' => 'required|string|max:255',
            'status_saat_ini' => 'required|string|max:255',
            'kode_jurusan' => 'required|string|max:255',
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan_parent' => 'required|string|max:255',
            'nama_jurusan_parent' => 'required|string|max:255',
            'kode_fakultas' => 'required|string|max:255',
            'nama_fakultas' => 'required|string|max:255',
        ]);

        // Simpan data ke tabel dosen
        DB::table('dosen')->insert([
            'nip' => $validatedDosen['nip'],
            'nama_dosen' => $validatedDosen['nama_dosen'],
            'email_sso' => $validatedDosen['email_sso'],
            'pns_nonpns' => $validatedDosen['pns_nonpns'],
            'status_ikatan_kerja' => $validatedDosen['status_ikatan_kerja'],
            'status_saat_ini' => $validatedDosen['status_saat_ini'],
            'kode_jurusan' => $validatedDosen['kode_jurusan'],
            'nama_jurusan' => $validatedDosen['nama_jurusan'],
            'kode_jurusan_parent' => $validatedDosen['kode_jurusan_parent'],
            'nama_jurusan_parent' => $validatedDosen['nama_jurusan_parent'],
            'kode_fakultas' => $validatedDosen['kode_fakultas'],
            'nama_fakultas' => $validatedDosen['nama_fakultas'],
        ]);

        return redirect('/login')->with('success', 'Akun anda berhasil dibuat, silahkan login untuk melanjutkan');
    }
}
