@extends('layouts.dashboard')

@section('container')

<h2>Penjadwalan Ulang</h2>

@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> {{ session('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="mb-3">
 <label for="name" class="form-label">Nama Peminjam</label>
  <input class="form-control" type="text" value="{{ $booking->user->name }}" aria-label="Disabled input example" disabled readonly>
</div>
<div class="mb-3">
 <label for="name" class="form-label">Tujuan Peminjam</label>
  <input class="form-control" type="text" value="{{ $booking->reason_to_booking }}" aria-label="Disabled input example" disabled readonly>
</div>
<div class="row">
  <div class="mb-3 col-6">
    <label for="name" class="form-label">No HP Peminjam</label>
    <br>
     <a href="https://wa.me/{{ $booking->user->phone_number ?? '' }}">{{ $booking->user->phone_number ?? '-' }}</a>
    </div>
   <div class="mb-3 col-6">
    <label for="name" class="form-label">Email Peminjam</label>
    <br>
     <a href="mailto:{{ $booking->user->email ?? '' }}">{{ $booking->user->email ?? '-' }}</a>
  </div>
</div>

<form method="POST" action="{{ route('reschedule.store', $id) }}">
 @csrf
 <div class="mb-3">
  <label for="name" class="form-label">Alasan Penjadwalan Ulang</label>
   <input class="form-control" type="text" name="reason_for_request">
 </div>
  <div class="mb-3">
   <label for="lab">Lab</label>
   <select class="form-select" name="new_lab_id">
     @foreach ($labs as $lab)
       <option value="{{ $lab->id }}" @if ($lab->id == $booking->lab_id) selected @endif>{{ $lab->name }}</option>
     @endforeach
   </select>
  </div>
  <div class="mb-3">
   <label for="" class="form-label">Tanggal</label>
   <input type="date" name="new_booking_date" class="form-control" id="" value="{{ $booking->booking_date }}">
  </div>
  <div class="row">
   <div class="col-6">
    <label for="start_time">Jam Mulai</label>
    <select class="form-select" name="new_start_time">
      <option selected>Pilih Jam Mulai</option>
      @foreach ($time_format as $key => $value)
       <option value="{{ $value[0] }}" @if ($value[0] == $booking->start_time) selected @endif>{{ $key }}</option>
      @endforeach
    </select>
   </div>
   <div class="col-6">
    <label for="end_time">Jam Selesai</label>
    <select class="form-select" name="new_end_time">
      <option selected>Pilih Jam Selesai</option>
      @foreach ($time_format as $key => $value)
       <option value="{{ $value[1] }}" @if ($value[1] == $booking->end_time) selected @endif>{{ $key }}</option>
      @endforeach
    </select>
   </div>
</div>

<div class="mt-3">
 <button type="submit" class="btn btn-primary">Ajukan Penjadwalan Ulang </button>
</div>
</form>

@endsection