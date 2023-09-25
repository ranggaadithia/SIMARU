@extends('layouts.dashboard')

@section('container')
<form action="{{ route('labs.store') }}" method="POST">
  @csrf
 <div class="mb-3">
   <label for="name" class="form-label">Lab Name</label>
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
   <label for="capacity" class="form-label"
     >Kapasitas</label
   >
   <input
     type="text"
     class="form-control"
     id="capacity"
     name="capacity"
     autocomplete="off"
   />
 </div>

 <div class="mb-3">
   <label for="size" class="form-label">Ukuran</label>
   <input
     type="text"
     class="form-control"
     id="size"
     name="size"
     autocomplete="off"
   />
 </div>
 <div class="mb-3">
   <label for="description" class="form-label"
     >Deskripsi</label
   >
   <input
     type="text"
     class="form-control"
     id="description"
     name="description"
     autocomplete="off"
   />
 </div>
 <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection