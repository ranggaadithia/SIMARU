<div> 
    <nav
    class="fixed top-0 z-20 flex-no-wrap flex w-full items-center justify-between bg-white/90 py-4 lg:flex-wrap border-b drop-shadow backdrop-blur-md">
        <div class="flex w-full flex-wrap items-center justify-between px-4 md:px-10">
            <div class="flex items-center justify-center">
              <a href="/">
                <img class="h-10" src="{{ asset('undiksha.png') }}" alt="">
              </a>
              <a href="/" class="text-2xl font-bold ml-1 hidden md:block">SIMARU</a>
            </div>
            <div class="text-xl flex items-center justify-between text-center md:w-80">
                <button class="hover:bg-gray-200 px-1 rounded-full transition-all ease-in-out duration-300 md:order-1" wire:click="prevWeek"><i class="bi bi-chevron-left text-md md:text-2xl"></i></button>
                <h3 class="md:mx-5 mx-0 ml-2 md:ml-0 hidden md:block font-semibold text-2xl order-2">
                    {{ $startDate->format('F Y') }}
                </h3>
                <h3 class="md:mx-5 mx-0 ml-2 md:ml-0 block md:hidden font-semibold text-2xl order-2">
                    {{ $startDate->format('M Y') }}
                </h3>
                <button class="hover:bg-gray-200 px-1 rounded-full transition-all ease-in-out duration-300 order-3 ml-1 md:ml-0" wire:click="nextWeek"><i class="bi bi-chevron-right text-md md:text-2xl"></i></button>
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
</div>
