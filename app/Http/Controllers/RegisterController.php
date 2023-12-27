<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('dashboard.lecturer.register');
    }

    public function list()
    {
        $lecturers = DB::table('tb_dosen')->get();
        return view('dashboard.lecturer.list', compact('lecturers'));
    }

    public function destroy($nip)
    {
        $dosen = DB::table('tb_dosen')->where('nip', $nip)->first();
        User::where('email', $dosen->email_sso)->delete();
        DB::table('tb_dosen')->where('nip', $nip)->delete();
        return back()->with('success', 'Akun dosen berhasil dihapus!');
    }

    public function register(Request $request)
    {
        // Validasi data pengguna
        $dataUser = [
            'name' => $request->nama_dosen,
            'email' => $request->email_sso,
            'phone_number' => $request->phone_number,
            'role' => 'dosen',
            'password' => bcrypt(env('DEFAULT_PASSWORD')),
        ];

        // Simpan data ke tabel users
        User::create($dataUser);

        // Validasi data dosen
        $validatedDosen = $request->validate([
            'nip' => 'required|string|max:255',
            'nama_dosen' => 'required|string|max:255',
            'email_sso' => 'required|string|email|max:255',
            'pns_nonpns' => 'required|string|max:255',
            'status_ikatan_kerja' => 'required|string|max:255',
            'status_saat_ini' => 'required|string|max:255',
            'kode_jurusan' => 'required|string|max:255',
            'kode_jurusan_parent' => 'required|string|max:255',
        ]);

        // Validasi kode jurusan parent
        switch ($validatedDosen['kode_jurusan_parent']) {
            case 501:
                $validatedDosen['nama_jurusan_parent'] = 'Jurusan Teknik Informatika';
                break;
            case 502:
                $validatedDosen['nama_jurusan_parent'] = 'Jurusan Teknologi Industri';
                break;
        }

        // Validasi kode jurusan
        switch ($validatedDosen['kode_jurusan']) {
            case 5401:
                $validatedDosen['nama_jurusan'] = 'Teknologi Rekayasa Perangkat Lunak';
                break;
            case 5402:
                $validatedDosen['nama_jurusan'] = 'Teknologi Rekayasa Sistem Elektronika';
                break;
            case 5501:
                $validatedDosen['nama_jurusan'] = 'Pendidikan Kesejahteraan Keluarga';
                break;
            case 5502:
                $validatedDosen['nama_jurusan'] = 'Pendidikan Teknik Informatika';
                break;
            case 5503:
                $validatedDosen['nama_jurusan'] = 'Pendidikan Teknik Elektro';
                break;
            case 5504:
                $validatedDosen['nama_jurusan'] = 'Pendidikan Teknik Mesin';
                break;
            case 5505:
                $validatedDosen['nama_jurusan'] = 'Pendidikan Vokasional dan Seni Kuliner';
                break;
            case 5506:
                $validatedDosen['nama_jurusan'] = 'Sistem Informasi';
                break;
            case 5507:
                $validatedDosen['nama_jurusan'] = 'Ilmu Komputer';
                break;
        }
        // Simpan data ke tabel dosen
        DB::table('tb_dosen')->insert([
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
            'kode_fakultas' => 5,
            'nama_fakultas' => "Fakultas Teknik dan Kejuruan",
        ]);

        return back()->with('success', 'Akun dosen berhasil dibuat!');
    }
}
