@extends('layouts.index')

@section('container')
 <div class="flex gap-x-2">
  @if (Route::has('login'))
  <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
      @auth
      {{ Auth::user()->name }}
          <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>

          <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="dark:text-white ">Logout</button>
          </form>
      @else
          <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

          @if (Route::has('register'))
              <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
          @endif
      @endauth
  </div>
  @endif
 </div>
 


<livewire:success-booking/>


@auth
    <livewire:modal-booking :user="Auth::user()" :labs="$labs" :timeMappings="$timeMappings"  />
@endauth

<livewire:schedule-calendar :labs="$labs" />

@push('scripts')
<script>
const datepickerDisablePast = document.getElementById('datepicker-disable-past');
  new te.Datepicker(datepickerDisablePast, {
    disablePast: true
  });

Livewire.on('close-modal', function () {
    // Menutup modal dengan data-te-modal-dismiss
    const modal = document.querySelector('[data-te-modal-init]');
    modal.click();
});

Livewire.on('success-booking', function () {
  const toasty = document.getElementById('static-example');    
    toasty.classList.replace('data-[te-toast-show]:hidden', 'data-[te-toast-show]:block')
    
    setTimeout(() => {
      toasty.classList.replace('data-[te-toast-show]:block', 'data-[te-toast-show]:hidden')
    }, 2000);
});
</script>
@endpush

@endsection