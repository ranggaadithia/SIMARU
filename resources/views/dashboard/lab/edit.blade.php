@extends('layouts.dashboard')

@section('container')
<h2>Edit {{ $lab->name }}</h2>
<form action="{{ route('labs.update', $lab->slug) }}" method="POST">
  @csrf
  @method('PUT')
 <div class="mb-3">
   <label for="name" class="form-label">Lab Name</label>
   <input
     type="text"
     class="form-control"
     id="name"
     name="name"
     value="{{ $lab->name }}"
     autocomplete="off"
     autofocus
   />
   @error('name')
  <div >
    {{ $message }}
  </div>
  @enderror
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
     value="{{ $lab->capacity }}"
     autocomplete="off"
   />
   @error('capacity')
  <div >
    {{ $message }}
  </div>
  @enderror
 </div>

 <div class="mb-3">
   <label for="size" class="form-label">Ukuran</label>
   <input
     type="text"
     class="form-control"
     id="size"
     name="size"
     value="{{ $lab->size }}"
     autocomplete="off"
   />
   @error('size')
  <div >
    {{ $message }}
  </div>
  @enderror
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
     value="{{ $lab->description }}"
     autocomplete="off"
   />
   @error('description')
  <div >
    {{ $message }}
  </div>
  @enderror
 </div>
 <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection