@extends('layouts.index')

@section('container')
 <div class="flex gap-x-2 ">
  @if (Route::has('login'))
  <div class="sm:fixed sm:top-0 w-full p-3 text-right z-10  ">
   
    <div class="ml-5 w-10 h-10 bg-white absolute rounded-md items-center justify-center flex font-bold text-blue-500 text-xl">
        S
    </div>
    <p class="absolute text-white ml-[68px] font-bold text-xl mt-1">SIMARU</p>
    {{-- Dropdown --}}
    {{-- <div class="relative" data-te-dropdown-ref>
        <button
          class="flex items-center justify-center bg-primary  text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out  w-10 h-10 rounded-full bg-white ml-[1257px]"
          type="button"
          id="dropdownMenuButton1"
          data-te-dropdown-toggle-ref
          aria-expanded="false"
          data-te-ripple-init
          data-te-ripple-color="light">
          <p class="item-center justify-center text-blue-500 font-bold text-xl">T</p>
          
          </span>
        </button>
        <ul
          class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
          aria-labelledby="dropdownMenuButton1"
          data-te-dropdown-menu-ref>
          <li>
            <a
              class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
              href="#"
              data-te-dropdown-item-ref
              >History</a
            >
          </li>
          <li>
            <a
              class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
              href="#"
              data-te-dropdown-item-ref
              >Logout</a
              
            >
          </li>
          
        </ul>
      </div>
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
  </div> --}}
 </div>
  @endif
 </div>
 


<livewire:success-booking/>


@auth
    <livewire:modal-booking :user="Auth::user()" :labs="$labs" :timeMappings="$timeMappings"  />
@endauth

<livewire:schedule-calendar :labs="$labs" lazy />

@push('scripts')
<script>

Livewire.on('close-modal', function () {
    // Menutup modal dengan data-te-modal-dismiss
    const modal = document.querySelector('[data-te-modal-init]');
    modal.click();
});

Livewire.on('showModalDetail', function () {
    // Menampilkan modal dengan data-te-modal-init
    const modal = document.getElementById('modalScheduleDetail');
    modal.classList.add('block');
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