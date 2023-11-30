@extends('layouts.auth')

@section('container')
@if (session()->has('success')) 
  <div
    class="mb-4 rounded-lg bg-green-100 px-6 py-5 text-base text-dark-700 w-[70%] mx-auto mt-5"
    role="alert">
    {{ session('success') }}
  </div>
@endif

  <div class="lg:flex">
   @include('auth.component')
    <div class="bg-[#F2F1FA] w-80 mx-auto  rounded-lg p-5 lg:w-96 lg:mt-24 shadow-md lg:shadow-2xl lg:p-7"> <!--Form-->
        <h2 class="text-blue-950 font-bold text-2xl">Reset Password</h2>
        <p class="my-2 text-[13px] max-w-[250px]">Ganti password anda menjadi lebih aman</p>
        <form action="{{ route('change.password') }}" method="POST">
          @csrf
            <label class="text-sm font-bold text-blue-950" for="password">Current Password</label><br>
            <input class="mb-3 mt-1 w-full  rounded-md p-2 text-[12px]" type="password" id="password" placeholder="********" name="current_password"><br>
            @error('current_password')
              <div class="text-sm text-red-500">
                {{ $message }}
              </div>
            @enderror
            <label class="text-sm font-bold text-blue-950" for="password">New Password</label><br>
            <input class="p-2 text-[12px]  mt-1 w-full mb-3 rounded-md" placeholder="*********" type="password" id="password" name="new_password"><br>
            @error('new_password')
              <div class="text-sm text-red-500">
                {{ $message }}
              </div>
            @enderror
            <label class="text-sm font-bold text-blue-950" for="password">Confirm New Password</label><br>
            <input class="p-2 text-[12px]  mt-1 w-full  rounded-md" placeholder="*********" type="password" id="password" name="confirm_password"><br>
            @error('confirm_password')
              <div class="text-sm text-red-500">
                {{ $message }}
              </div>
            @enderror
            <button class="hover:bg-blue-950 bg-blue-950 text-white text-md font-bold py-2 px-4 rounded-md w-full mt-4 mb-2" type="submit">Reset Password </button>
        </form>
    </div>
  </div>
</div>
@endsection