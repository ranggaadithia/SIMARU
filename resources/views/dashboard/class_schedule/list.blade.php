@extends('layouts.dashboard')

@section('container')
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
<a href="{{ route('class-schedule.create') }}" class="btn btn-primary">Add Class Schedule</a>
<ul class="nav nav-tabs mt-5">
 <li class="nav-item">
   <a class="nav-link" href="{{ route('class-schedule.index') }}">Calendar</a>
 </li>
 <li class="nav-item">
   <a class="nav-link active" aria-current="page" href="{{ route('class-schedule.list') }}">List</a>
 </li>
</ul>
<table class="table">
 <thead>
   <tr>
     <th scope="col">#</th>
     <th scope="col">Mata Kuliah</th>
     <th scope="col">Lab</th>
     <th scope="col">Hari</th>
     <th scope="col">Dosen</th>
     <th scope="col">Kelas</th>
     <th scope="col">Jam Mulai</th>
     <th scope="col">Jam Selesai</th>
     <th scope="col">Action</th>
   </tr>
 </thead>
 <tbody>
  @foreach ($classSchedules as $class)
   <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $class->subject }}</td>
      <td>{{ $class->lab->name }}</td>
      <td>{{ $class->day }}</td>
      <td>{{ $class->lecturer }}</td>
      <td>{{ $class->class }}</td>
      <td class="text-center">{{ App\Utilities\TimeMappings::convertToLetter($class->start_time) }}</td>
      <td class="text-center">{{ App\Utilities\TimeMappings::convertToLetter($class->end_time) }}</td>
      <td class="d-flex">
       <a href="{{ route('class-schedule.edit', $class->id) }}" class="btn btn-warning">Edit</a>
       <div class="mx-1"></div>
       <form action="{{ route('class-schedule.destroy', $class->id) }}" method="post">
         @csrf
         @method('delete')
         <button type="submit" value="Delete" class="btn btn-danger">
          Delete
         </button>
       </form>
      </td>
     </tr>
     @endforeach
 </tbody>
</table>
@endsection