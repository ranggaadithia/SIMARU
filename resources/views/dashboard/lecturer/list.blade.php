@extends('layouts.dashboard')

@section('container')

<h3>List Dosen</h3>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
    ></button>
</div>
@endif

<table id="myTable">
 <thead>
  <tr>
   <th>NIP/ID</th>
   <th>Nama Dosen</th>
   <th>Email SSO</th>
   <th>Action</th>
  </tr>
 </thead>
 <tbody>
  @foreach ($lecturers as $dosen)
  <tr>
   <td>{{ $dosen->nip }}</td>
   <td>{{ $dosen->nama_dosen }}</td>
   <td>{{ $dosen->email_sso }}</td>
   <td>
    <form action="{{ route('lecturer.delete', $dosen->nip) }}" method="POST">
     @csrf
     @method('DELETE')
     <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
   </td>
  </tr>
  @endforeach
 </tbody>
</table>

@endsection