@extends('layouts.index')
 
 @section('container')
  <form action="{{ route('login') }}" method="POST">
    @csrf
    <input type="email" name="email" id="email" placeholder="email">
    @error('email')
    <div >
      {{ $message }}
    </div>
    @enderror
    <input type="password" name="password" id="password" placeholder="password">
    <button type="submit">login</button>
 </form>
@endsection