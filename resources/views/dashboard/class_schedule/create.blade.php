@extends('layouts.dashboard')

@section('container')

<h2>Add Class Schedule</h2>

<form action="" class="mt-3" style="width: 80%">
 <div class="mb-3">
  <label for="name" class="form-label">Mata Kuliah</label>
  <input
    type="text"
    class="form-control"
    id="name"
    name="name"
    autocomplete="off"
    autofocus
  />
</div>
<div class="mb-3">
 <label for="lecturer" class="form-label">Dosen Pengampu</label>
 <input class="form-control" list="lecturerOption" id="lecturer">
</div>
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