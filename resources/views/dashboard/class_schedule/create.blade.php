@extends('layouts.dashboard')

@section('container')

<h2>Add Class Schedule</h2>

@error('subject')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed</strong> {{ $message }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror

<form action="{{ route('class-schedule.store') }}" method="POST" class="mt-3" style="width: 80%">
  @csrf
 <div class="mb-3">
  <label for="name" class="form-label">Mata Kuliah</label>
  <input
    type="text"
    class="form-control"
    id="subject"
    name="subject"
    autocomplete="off"
    value="{{ old('name') }}"
    autofocus
  />
</div>
<div class="mb-3">
 <label for="lecturer" class="form-label">Dosen Pengampu</label>
 <input class="form-control" type="text" name="lecturer"
 autocomplete="off" list="lecturerOption" id="lecturer" value="{{ old('lecturer') }}">
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
    value="{{ old('class') }}"
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
    <option selected>Pilih Lab</option>
    @foreach ($labs as $lab)
      <option value="{{ $lab->id }}">{{ $lab->name }}</option>
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
      <option selected>Pilih Hari</option>
      <option value="monday">Senin</option>
      <option value="tuesday">Selasa</option>
      <option value="wednesday">Rabu</option>
      <option value="thursday">Kamis</option>
      <option value="friday">Jumat</option>
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
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
      <option value="D">D</option>
      <option value="E">E</option>
      <option value="F">F</option>
      <option value="G">G</option>
      <option value="H">H</option>
      <option value="I">I</option>
      <option value="J">J</option>
      <option value="K">K</option>
      <option value="L">L</option>
      <option value="M">M</option>
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
      <option selected>Pilih Jam Selesai</option>
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
      <option value="D">D</option>
      <option value="E">E</option>
      <option value="F">F</option>
      <option value="G">G</option>
      <option value="H">H</option>
      <option value="I">I</option>
      <option value="J">J</option>
      <option value="K">K</option>
      <option value="L">L</option>
      <option value="M">M</option>
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