@extends('layouts.index')

@section('container')
<div> 
    <nav
    class="fixed top-0 z-20 flex-no-wrap flex w-full items-center justify-between bg-white py-4 lg:flex-wrap border-b">
        <div class="flex w-full flex-wrap items-center justify-between px-4 md:px-10">
            <div class="hidden md:block">
                <a href="/" class="text-2xl font-bold">SIMARU</a>
            </div>
            <div class="text-xl text-center">
                <h3 class="md:mx-5 mx-0 ml-2 md:ml-0 font-semibold text-2xl order-3 md:order-2">
                    History Booking Lab
                </h3>
            </div>
            <div class="">
                @auth
                <div class="relative" data-te-dropdown-ref>
                    <button
                      class="flex items-center whitespace-nowrap rounded   pr-3 first-letter:text-sm font-medium uppercase leading-normal"
                      type="button"
                      id="dropdownMenuButton1"
                      data-te-dropdown-toggle-ref
                      aria-expanded="false"
                      data-te-ripple-init
                      data-te-ripple-color="light">
                      <i class="bi bi-person-circle text-3xl"></i>
                      <span class="w-2 text-blue-400 hidden md:block">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                          class="h-5 w-5">
                          <path
                            fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                        </svg>
                      </span>
                    </button>
                    <ul
                      class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                      aria-labelledby="dropdownMenuButton1"
                      data-te-dropdown-menu-ref>
                      @if (auth()->user()->role === 'admin')
                      <li>
                        <a
                          class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                          href="/dashboard"
                          data-te-dropdown-item-ref
                          ><i class="bi bi-speedometer2 text-blue-400"></i> Dashboard</a
                        >
                      </li>
                      @endif
                      <li>
                        <a
                          class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                          href="/history"
                          data-te-dropdown-item-ref
                          ><i class="bi bi-clock-history text-blue-400"></i> Booking History</a
                        >
                      </li>
                      <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button
                            class="text-left w-full bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            data-te-dropdown-item-ref
                            ><i class="bi bi-box-arrow-right text-blue-400"></i> Logout</button
                            >
                        </form>

                      </li>
                    </ul>
                  </div>
                @else
                  <a href="{{ route('login') }}" class="text-sm uppercase font-semibold">Login</a>
                @endauth
                
            </div>
        </div>
    </nav>
</div>

<h1 class="ml-4 text-xl font-bold mt-20 text-neutral-600 dark:text-neutral-200 ">Mendatang</h1>
@foreach ($upcomingHistories as $history)
<div class="block mx-4 lg:mx-28  rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 mt-3">
    <div class="border-b-2 border-neutral-100 px-6 py-3 dark:border-neutral-600 dark:text-neutral-50 text-xl font-semibold">
            {{ $history->reason_to_booking }}
        </div>
        <div class="p-6">
            <h5 class="mb-2 text-lg font-medium leading-tight text-neutral-600 dark:text-neutral-200">
                {{ \Carbon\Carbon::parse($history->booking_date)->format('d F Y') }}
                <br>
                ({{ \Carbon\Carbon::parse($history->booking_date)->diffForHumans()}})
            </h5>
            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                {{ $history->start_time }} - {{ $history->end_time }}
            </p>
            
            <form action="{{ route('labs-booking.destroy', $history->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="px-4 py-2 bg-red-500 font-semibold text-white text-sm rounded-md" 
                onclick="return confirm('Apakah anda yakin ingin membatalkan booking ini?')"
                >Batalkan Booking</button></form>
            </form>
        </div>
    </div>
@endforeach



    
<h1 class=" text-xl font-bold ml-4 mt-10 text-neutral-600 dark:text-neutral-200">Selesai</h1>
@foreach ($expiredHistories as $history)
<div class="block mx-4  rounded-lg bg-gray-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 mt-3">
    <div class="border-b-2 border-neutral-100 px-6 py-3 dark:border-neutral-600 dark:text-neutral-50 text-xl font-semibold">
        {{ $history->reason_to_booking }}
    </div>
    <div class="p-6">
        <h5 class="mb-2 text-lg font-medium leading-tight text-neutral-600 dark:text-neutral-200">
            {{ \Carbon\Carbon::parse($history->booking_date)->format('d F Y') }}
        </h5>
        <p class="mb-2 text-base text-neutral-600 dark:text-neutral-200">
            {{ $history->start_time }} - {{ $history->end_time }}
        </p>
    </div>
</div>
@endforeach


@endsection