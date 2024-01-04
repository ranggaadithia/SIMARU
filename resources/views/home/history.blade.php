@extends('layouts.index')

@section('container')
<div>
  <nav
  class="fixed top-0 z-20 flex-no-wrap flex w-full items-center justify-between bg-white/90 py-4 lg:flex-wrap border-b drop-shadow backdrop-blur-md">
      <div class="flex w-full flex-wrap items-center justify-between px-4 md:px-10">
          <div class="flex items-center justify-center">
            <a href="/">
              <img class="h-10" src="{{ asset('undiksha.png') }}" alt="">
            </a>
            <a href="/" class="text-2xl font-bold ml-1">SIMARU</a>
          </div>
          <div class="text-xl flex items-center justify-between text-center md:w-80">
          </div>
          <div class="">
              @auth
              <div class="relative" data-te-dropdown-ref>
                  <button
                    class="flex items-center whitespace-nowrap rounded first-letter:text-sm font-medium uppercase leading-normal"
                    type="button"
                    id="dropdownMenuButton1"
                    data-te-dropdown-toggle-ref
                    aria-expanded="false"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    <i class="bi bi-person-circle text-4xl mr-1"></i>
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
                        ><i class="bi bi-speedometer2 text-blue-400"></i><span class="ml-2">Dashboard</span></a
                      >
                    </li>
                    @endif
                    <li>
                      <a
                        class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                        href="/history"
                        data-te-dropdown-item-ref
                        ><i class="bi bi-clock-history text-blue-400"></i><span class="ml-2">Riwayat</span></a
                      >
                    </li>
                    <li>
                      <form action="{{ route('logout') }}" method="post">
                          @csrf
                          <button
                          class="text-left w-full bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600 "
                          data-te-dropdown-item-ref
                          ><i class="bi bi-box-arrow-right text-blue-400"></i><span class="ml-2">Keluar</span></button
                          >
                      </form>

                    </li>
                  </ul>
                </div>
              @else
                <a href="{{ route('login') }}" class="text-lg uppercase font-semibold hidden md:block">Masuk</a>
                <a href="{{ route('login') }}" class="text-3xl uppercase font-semibold md:hidden"><i class="bi bi-box-arrow-in-right"></i></a>
              @endauth
              
          </div>
      </div>
  </nav>

  <div class="mt-24 px-4 md:px-8 pb-11">
      <h1 class="text-center mx-auto text-xl font-bold">Riwayat Peminjaman Ruangan </h1>
    
      @if (count($upcomingHistories) == 0 && count($expiredHistories) == 0)
        <div class="mt-20 text-center">
          <h1 class="mt-5 font-semibold text-3xl">Anda belum memesan Ruangan</h1>
        </div>
      @endif



  @if(count($upcomingHistories) > 0)
  <h1 class=" text-lg font-semibold mt-5 text-neutral-600 dark:text-neutral-200 ">Mendatang</h1>

  @foreach ($upcomingHistories as $history)
  <div class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 mt-3 w-full">
      <div class="border-b-2 border-neutral-100 px-6 py-3 dark:border-neutral-600 dark:text-neutral-50 text-xl font-semibold ">
      {{ $history->reason_to_booking }} | <span class="font-medium text-lg">R. {{ str_replace('Ruang ', '', $history->lab->name) }}</span> 
          </div>
          <div class="p-6">
              <h5 class="mb-2 text-lg font-medium leading-tight text-neutral-600 dark:text-neutral-200">
                  {{ \Carbon\Carbon::parse($history->booking_date)->format('d F Y') }}
                  <span class="text-base font-normal">({{ \Carbon\Carbon::parse("$history->booking_date $history->start_time")->diffForHumans()}})</span>
              </h5>
              <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                  {{ $history->start_time }} - {{ $history->end_time }}
              </p>
              <form action="{{ route('labs-booking.destroy', $history->id) }}" method="POST" id="deleteForm">
                @csrf
                @method('delete')
                <button type="submit" class="px-4 py-2 bg-red-500 font-semibold text-white text-sm rounded-md" 
                onclick="confirm('Apakah anda yakin ingin membatalkan peminjaman ini?')"
                >Batalkan Peminjam</button></form>
              </form>
            
          </div>
      </div>
  @endforeach
@endif

@if ($expiredHistories->count() > 0)

  <h1 class="text-lg font-semibold mt-10 text-neutral-600 dark:text-neutral-200">Selesai</h1>

  @foreach ($expiredHistories as $history)
  <div class="block rounded-lg bg-gray-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 mt-3" @if ($loop->last) id="last_record" @endif>
      <div class="border-b-2 border-neutral-100 px-6 py-3 dark:border-neutral-600 dark:text-neutral-50 text-xl font-semibold ">
          {{ $history->reason_to_booking }} | <span class="font-medium text-lg">R. {{ str_replace('Ruang ', '', $history->lab->name) }}</span> 
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
  @endif

  @push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
     // Get all elements with the id starting with 'cancelBtn'
const cancelBtns = document.querySelectorAll('#cancelBtn');


// Add a click event listener to each cancel button
cancelBtns.forEach(function (cancelBtn) {
     cancelBtn.addEventListener('click', function (e) {
         e.preventDefault();

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Untuk membatalkan peminjaman ruangan ini.',
            icon: 'warning',
            iconColor: '#172554',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#172554',
            confirmButtonText: 'Ya, Batalkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Get the associated deleteForm based on the clicked cancel button
                const deleteFormId = cancelBtn.getAttribute('form');
                const deleteForm = document.getElementById(deleteFormId);

                if (deleteForm) {
                    // Submit the delete form
                    deleteForm.submit();

                    Swal.fire({
                        position: 'top-end',
                        title: 'Cancelled!',
                        text: 'Booking anda berhasil dibatalkan.',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 2000,
                        icon: 'success',
                    });
                } else {
                    console.error('Delete form not found!');
                }
            }
        });
    });
});
  </script>
  @endpush
</div>
@endsection