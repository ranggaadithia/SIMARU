@extends('layouts.dashboard')

@section('container')

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tujuan</th>
      <th scope="col">Nama Lab</th>
      <th scope="col">Hari</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Jam Mulai</th>
      <th scope="col">Jam selesai</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Rekayasa bangunan</td>
      <td>LAB APA GITU</td>
      <td>Senin</td>
      <td>26/09/2023</td>
      <td>09.00</td>
      <td>12.00</td>
      <td>
        <a href="" class="btn btn-warning">Request Reschadule</a>
      </td>
    </tr>
  </tbody>
</table>


@endsection