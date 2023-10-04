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
    <div class="text-white hidden lg:block lg:mx-auto lg:mt-28 lg:ml-60 lg:-mr-20"> <!--Responsive-->
        <span><h1 class="text-4xl font-bold mb-3">Sistem</h1></span>
        <span><h1 class="text-4xl font-bold mb-3">Peminjaman</h1></span>
        <span><h1 class="text-4xl font-bold mb-4">Ruangan</h1></span>
        <h3 class="text-lg mt-1 font-bold mb-4">Fakultas Teknik dan Kejuruan</h3>
        <p class="text-xs leading-5">Jika anda memiliki pertanyaan atau kendala <br> bisa menghubungi kontak dibawah</p>
        <div class="flex flex-row items-center p-4">
            <div>
              <i class="bi bi-envelope"></i>
            </div>
            <div>
                <a href="#"><h4 class="text-xs ml-2">ftk@undiksha.ac.id</h4></a>
            </div>
        </div>
        <div class="flex flex-row items-center p-4 -mt-3">
            <div >
              <i class="bi bi-telephone"></i>
            </div>
            <div>
                <a href="#"><h4 class="text-xs ml-2">(+62)81238396581</h4></a>
            </div>
        </div>
        <div class="flex flex-row items-center p-4 -mt-3">
            <div >
              <i class="bi bi-geo-alt"></i>
            </div>
            <div>
                <a href="#"><h4 class="text-xs ml-2 leading-5">Jl. Udayana Banjar Tegal, Kec. Buleleng,<br> Kabupaten Buleleng</h4></a>
            </div>
        </div>
    </div>

    <div class="text-white ml-14 mb-6 pt-12 font-bold lg:hidden"> <!--Judul-->
        <span><h1 class="text-2xl">Sistem</h1></span>
        <span><h1 class="text-2xl">Peminjaman</h1></span>
        <span><h1 class="text-2xl">Ruangan</h1></span>
        <h3 class="text-xs mt-1">Fakultas Teknik dan Kejuruan</h3>
    </div>
    <div class="bg-[#F2F1FA] w-80 mx-auto  rounded-lg p-5 lg:w-96 lg:mt-24 shadow-md lg:shadow-2xl lg:p-7"> <!--Form-->
        <h2 class="text-[#60A5FA] font-bold text-2xl">Sign In</h2>
        <p class="mt-1 text-[13px] max-w-[250px]">Gunakan akun Undiksha untuk login ke dalam Sistem Peminjaman Ruangan FTK</p>
        <form action="{{ route('login') }}" method="POST">
          @csrf
            <label class=" text-sm font-bold text-[#60A5FA]" for="email">Email</label><br>
            <input class="mb-3 mt-1 w-full  rounded-md p-2 text-[12px]" placeholder="email@undiksha.ac.id" type="email" id="email" name="email"><br>
            @error('email')
              <div class="text-sm text-red-500">
                {{ $message }}
              </div>
            @enderror

            <label class="text-sm font-bold text-[#60A5FA]" for="password">Password</label><br>
            <input class="p-2 text-[12px]  mt-1 w-full  rounded-md" placeholder="*********" type="password" id="password" name="password"><br>

            <button class="hover:bg-blue-500 bg-[#60A5FA] text-white text-md font-bold py-2 px-4 rounded-md w-full mt-4 mb-2" type="submit">Sign In </button>
        </form>
        <p class="text-[13px] max-w-[250px]">Untuk pengguna dari luar Undiksha, silakan membuat akun di  bawah ini</p>
        <a href="/register" class="text-[13px] text-b1 underline text-[#60A5FA]" type="submit"><p class="mt-1">Sign Up</p></a>
    </div>
  </div>
</div>
@endsection