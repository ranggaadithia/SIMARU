@extends('layouts.dashboard')

@section('container')

<h1>Move Schedule</h1>
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed</strong> {{ session('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tujuan</th>
      <th scope="col">Peminjam</th>
      <th scope="col">Lab</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Jam Mulai</th>
      <th scope="col">Jam selesai</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($labsBooking as $booking)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $booking->reason_to_booking }}</td>
      <td>{{ $booking->user->name }}</td>
      <td>{{ $booking->lab->name }}</td>
      <td>{{ $booking->booking_date }}</td>
      <td>{{ $booking->start_time }}</td>
      <td>{{ $booking->end_time }}</td>
      <td class="d-flex">
        <a href="{{ route('reschedule.create', $booking->id) }}" class="btn btn-outline-warning me-1">Reschadule</a>
        <form action="{{ route('labs-booking.destroy', $booking->id) }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-outline-danger">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection