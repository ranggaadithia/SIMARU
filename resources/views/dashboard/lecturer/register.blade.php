@extends('layouts.dashboard')

@section('container')
<form action="{{ route('register') }}" method="POST">
  @csrf
 <div class="mb-3">
   <label for="name" class="form-label">Nama Dosen</label>
   <input
     type="text"
     class="form-control"
     id="nama_dosen"
     name="nama_dosen"
     value="{{ old('name') }}"
     autocomplete="off"
     autofocus
   />
 </div>


 
 <div class="mb-3">
   <label for="capacity" class="form-label"
     >NIP/ID</label
   >
   <input
     type="number"
     class="form-control"
     id="nip"
     name="nip"
     value="{{ old('nip') }}"
     autocomplete="off"
   />
 </div>



 <div class="mb-3">
   <label for="size" class="form-label">Email SSO Undiksha</label>
   <input
     type="email"
     class="form-control"
     id="email_sso"
     name="email_sso"
     value="{{ old('email_sso') }}"
     autocomplete="off"
   />
 </div>



 <div class="mb-3">
   <label for="description" class="form-label"
     >Nomor HP</label
   >
   <input
     type="number"
     class="form-control"
     id="phone_number"
     name="phone_number"
     value="{{ old('phone_number') }}"
     autocomplete="off"
   />
 </div>





 <div class="mb-3">
    <label for="description" class="form-label"
      >Status Ikatan Kerja</label
    >
    <select class="form-select" name="status_ikatan_kerja">
        <option selected>Pilih Status</option>
        <option value="PNS">PNS</option>
        <option value="NON-PNS">Non PNS</option> 
    </select>
  </div>



 <div class="mb-3">
    <label for="description" class="form-label"
      >Status Saat Ini</label
    >
    <select class="form-select" name="status_saat_ini">
        <option selected>Pilih Status</option>
        <option value="Aktif">Aktif</option>
        <option value="Tugas Belajar">Tugas Belajar</option> 
        <option value="Ijin Belajar">Ijin Belajar</option> 
    </select>
  </div>



 <div class="mb-3">
    <label for="description" class="form-label"
      >Prodi</label
    >
    <select class="form-select" name="nama_jurusan">
        <option selected>Pilih Prodi</option>
        <option value="5507">Ilmu Komputer</option>
        <option value="5506">Sistem Informasi</option> 
        <option value="5401">Teknologi Rekayasa Perangkat Lunak</option>
        <option value="5402">Teknologi Rekayasa Sistem Elektronika</option> 
        <option value="5502">Pendidikan Teknik Informatika</option> 
        <option value="5504">Pendidikan Teknik Mesin</option> 
        <option value="5501">Pendidikan Kesejahteraan Keluarga</option> 
        <option value="5503">Pendidikan Teknik Elektro</option> 
        <option value="5505">Pendidikan Vokasional dan Seni Kuliner</option> 
    </select>
  </div>



 <div class="mb-3">
    <label for="description" class="form-label"
      >Jurusan</label
    >
    <select class="form-select" name="nama_jurusan_parent">
        <option selected>Pilih Jurusan</option>
        <option value="501">Jurusan Teknik Informatika</option>
        <option value="502">Jurusan Teknologi Industri</option> 
    </select>
  </div>






 <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection