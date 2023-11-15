<div> 
    <nav
    class="fixed top-0 z-20 flex-no-wrap flex w-full items-center justify-between bg-white py-4 lg:flex-wrap border-b">
        <div class="flex w-full flex-wrap items-center justify-between px-4 md:px-10">
            <div class="hidden md:flex item-center">
              <img class="h-10 ml-4" src="undiksha.png" alt="">
              <a href="/" class="text-2xl font-bold ml-1">SIMARU</a>
            </div>
            <div class="text-xl flex items-center justify-between text-center md:w-80">
                <button class="hover:bg-gray-200 px-1 rounded-full transition-all ease-in-out duration-300 md:order-1" wire:click="prevWeek"><i class="bi bi-chevron-left text-md md:text-2xl"></i></button>
                <h3 class="md:mx-5 mx-0 ml-2 md:ml-0 font-semibold text-2xl order-3 md:order-2">
                    {{ $startDate->format('F Y') }}
                </h3>
                <button class="hover:bg-gray-200 px-1 rounded-full transition-all ease-in-out duration-300 order-2 md:order-3 ml-1 md:ml-0" wire:click="nextWeek"><i class="bi bi-chevron-right text-md md:text-2xl"></i></button>
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
                      <i class="bi bi-person-circle text-4xl mr-1"></i>
                      {{-- <span class="w-2 text-blue-400 hidden md:block">
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
                      </span> --}}
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
                          ><i class="bi bi-speedometer2 text-blue-400"></i><span class="ml-2">Halaman Utama</span></a
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
                  <a href="{{ route('login') }}" class="text-lg mr-4 uppercase font-semibold">Masuk</a>
                @endauth
                
            </div>
        </div>
    </nav>
</div>
