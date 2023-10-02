@extends('layouts.index')



@section('container')
  <form action="{{ route('register') }}" method="POST">
    @csrf 
    <input type="text" name="name" id="name" placeholder="name">
    @error('name')
    <div >
      {{ $message }}
    </div>
    @enderror
    <input type="email" name="email" id="email" placeholder="email">
    @error('email')
    <div >
      {{ $message }}
    </div>
    @enderror
    <input type="password" name="password" id="password" placeholder="password">
    @error('password')
    <div >
      {{ $message }}
    </div>
    @enderror
    <input type="phone" name="phone_number" id="phone" placeholder="phone">
    @error('phone_number')
    <div >
      {{ $message }}
    </div>
    @enderror
    <button type="submit">register</button>
  </form>

@endsection