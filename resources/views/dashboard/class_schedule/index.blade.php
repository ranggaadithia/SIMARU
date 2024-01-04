@extends('layouts.dashboard')

@push('style')
    <style>
      .bg-light-gray {
          background-color: #f7f7f7;
      }
      .table-bordered thead td,
      .table-bordered thead th {
          border-bottom-width: 2px;
      }
      .table thead th {
          vertical-align: bottom;
          border-bottom: 2px solid #dee2e6;
      }
      .table-bordered td,
      .table-bordered th {
          border: 1px solid #dee2e6;
      }

      .bg-sky.box-shadow {
          box-shadow: 0px 5px 0px 0px #00a2a7;
      }

      .bg-orange.box-shadow {
          box-shadow: 0px 5px 0px 0px #af4305;
      }

      .bg-green.box-shadow {
          box-shadow: 0px 5px 0px 0px #4ca520;
      }

      .bg-yellow.box-shadow {
          box-shadow: 0px 5px 0px 0px #dcbf02;
      }

      .bg-pink.box-shadow {
          box-shadow: 0px 5px 0px 0px #e82d8b;
      }

      .bg-purple.box-shadow {
          box-shadow: 0px 5px 0px 0px #8343e8;
      }

      .bg-lightred.box-shadow {
          box-shadow: 0px 5px 0px 0px #d84213;
      }

      .bg-sky {
          background-color: #02c2c7;
      }

      .bg-orange {
          background-color: #e95601;
      }

      .bg-green {
          background-color: #5bbd2a;
      }

      .bg-yellow {
          background-color: #f0d001;
      }

      .bg-pink {
          background-color: #ff48a4;
      }

      .bg-purple {
          background-color: #9d60ff;
      }

      .bg-lightred {
          background-color: #ff5722;
      }

      .padding-15px-lr {
          padding-left: 80px;
          padding-right: 80px;
      }
      .padding-5px-tb {
          padding-top: 5px;
          padding-bottom: 5px;
      }
      .margin-10px-bottom {
          margin-bottom: 10px;
      }
      .border-radius-5 {
          border-radius: 5px;
      }

      .margin-10px-top {
          margin-top: 10px;
          overflow: hidden;
          width: 80%;
          display: inline-block;
          text-overflow: ellipsis;
          white-space: nowrap;
      }
      .font-size14 {
          font-size: 14px;
      }

      .text-light-gray {
          color: #d6d5d5;
      }
      .font-size13 {
          font-size: 13px;
      }

      .table-bordered td,
      .table-bordered th {
          border: 1px solid #dee2e6;
      }
      .table td,
      .table th {
          padding: 0.75rem;
          vertical-align: top;
          border-top: 1px solid #dee2e6;
      }

    </style>
@endpush

@section('container')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil</strong> {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Gagal</strong> {{ session('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<a href="{{ route('class-schedule.create') }}" class="btn btn-primary">Tambah Jadwal Kelas</a>
  <ul class="nav nav-tabs mt-5">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{ route('class-schedule.index') }}">Kalender</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('class-schedule.list') }}" wire:navigate>List</a>
    </li>
  </ul>

<livewire:class-schedule :days="$days" :classSchedules="$classSchedules" />

  
@endsection