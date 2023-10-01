@extends('layouts.dashboard')

@section('container')

<h2>Add Class Schedule</h2>

@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed</strong> {{ session('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<form action="{{ route('class-schedule.update', $classSchedule->id) }}" method="POST" class="mt-3" style="width: 80%">
  @csrf
  @method('PATCH')
 <div class="mb-3">
  <label for="name" class="form-label">Mata Kuliah</label>
  <input
    type="text"
    class="form-control"
    id="subject"
    name="subject"
    autocomplete="off"
    value="{{ old('subject', $classSchedule->subject) }}"
    autofocus
  />
  @error('subject')
  <div >
    {{ $message }}
  </div>
  @enderror
</div>
<div class="mb-3">
 <label for="lecturer" class="form-label">Dosen Pengampu</label>
 <input class="form-control" type="text" name="lecturer"
 autocomplete="off" list="lecturerOption" id="lecturer" value="{{ old('lecturer', $classSchedule->lecturer) }}">
 @error('lecturer')
  <div >
    {{ $message }}
  </div>
  @enderror
</div>
<div class="mb-3">
  <label for="class" class="form-label">Kelas</label>
  <input
    type="text"
    class="form-control"
    id="class"
    name="class"
    autocomplete="off"
    value="{{ old('class', $classSchedule->class) }}"
  />
  @error('class')
  <div >
    {{ $message }}
  </div>
  @enderror
</div>
<div class="mb-3">
  <label for="lab">Lab</label>
  <select class="form-select" name="lab_id">
    @foreach ($labs as $lab)
      <option value="{{ $lab->id }}" @if ($lab->id) selected @endif>{{ $lab->name }}</option>
    @endforeach
  </select>
  @error('lab_id')
  <div >
    {{ $message }}
  </div>
  @enderror
</div>
<div class="row">
  <div class="col-4">
    <label for="lab">Hari</label>
    <select class="form-select" name="day">
      <option value="monday" @if ($classSchedule->day == 'monday') selected @endif>Senin</option>
      <option value="tuesday" @if ($classSchedule->day == 'tuesday') selected @endif>Selasa</option>
      <option value="wednesday" @if ($classSchedule->day == 'wednesday') selected @endif>Rabu</option>
      <option value="thursday" @if ($classSchedule->day == 'thursday') selected @endif>Kamis</option>
      <option value="friday" @if ($classSchedule->day == 'friday') selected @endif>Jumat</option>
    </select>
    @error('day')
  <div >
    {{ $message }}
  </div>
  @enderror
  </div>
  <div class="col-4">
    <label for="lab">Jam Mulai</label>
    <select class="form-select" name="start_time">
      <option selected>Pilih Jam Mulai</option>
      @foreach ($time_format as $time)
       <option value="{{ $time }}" @if ($time == App\Utilities\TimeMappings::convertToLetter($classSchedule->start_time))
           selected
       @endif>{{ $time }}</option>
      @endforeach
    </select>
    @error('start_time')
  <div >
    {{ $message }}
  </div>
  @enderror
  </div>
  <div class="col-4">
    <label for="lab">Jam Selesai</label>
    <select class="form-select" name="end_time">
     @foreach ($time_format as $time)
     <option value="{{ $time }}" @if ($time == App\Utilities\TimeMappings::convertToLetter($classSchedule->end_time))
         selected
     @endif>{{ $time }}</option>
    @endforeach
    </select>
    @error('end_time')
  <div >
    {{ $message }}
  </div>
  @enderror
  </div>
</div>
<button type="submit" class="btn btn-primary mt-3">simpan</button>
</form>


<script>
 const dosenInput = document.getElementById('lecturer');
 const lecturerOption = document.getElementById('lecturerOption');
 let isFirstInput = true;

 dosenInput.addEventListener('input', function () {
     if (this.value) {
       if(isFirstInput) {
         var nilaiArray = @json($lecturers);
         var datalist = document.createElement('datalist');
             datalist.id = 'lecturerOption';

               for (var i = 0; i < nilaiArray.length; i++) {
                 var option = document.createElement('option');
                 option.value = nilaiArray[i];
                 datalist.appendChild(option);
             }

             document.body.appendChild(datalist);

             document.getElementById('lecturer').setAttribute('list', 'lecturerOption');
         isFirstInput = false;
       }
     }
      else {
       var datalist = document.getElementById('lecturerOption');
       if(datalist) {
         datalist.remove();
       }
         isFirstInput = true;
     }
    });
</script>
@endsection