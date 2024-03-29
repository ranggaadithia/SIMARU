<div class="xl:flex xl:justify-center">
    <div class="grid grid-cols-[70px,repeat(7,170px)] grid-rows-[repeat(14,50px)] @mobile overflow-x-scroll @endmobile transition-opacity duration-100" id="scrollContainer" wire:loading.class="opacity-50">
        <div class="row-start-[1] col-start-[1] sticky @desktop top-16 @enddesktop z-10 bg-white dark:bg-gradient-to-b dark:from-slate-600 dark:to-slate-700 border-slate-100 dark:border-black/10 bg-clip-padding text-slate-900 dark:text-slate-200 border-b text-xs font-base py-2 flex items-center ml-1" id="sticky1"></div>
        @php
            $col = 2;
        @endphp
        @foreach ($weekDates as $week)
        @if ($week['date'] == $today)
        <div class="row-start-[1] col-start-[{{ $col }}] sticky @desktop top-16 @enddesktop z-10 bg-white dark:bg-gradient-to-b dark:from-slate-600 dark:to-slate-700 border-slate-100 dark:border-black/10 bg-clip-padding text-slate-900 dark:text-slate-200 border-b text-sm font-medium py-2 text-center" id="sticky2">
            <span class="uppercase font-light text-blue-600">
                {{ Illuminate\Support\Str::limit($week['day'], 3, '') }} 
            </span>
            <br>
            <span class="font-semibold text-blue-600">
                {{ \Carbon\Carbon::parse($week['date'])->format('d') }}
            </span>
        </div>
        @else
        <div class="row-start-[1] col-start-[{{ $col }}] sticky @desktop top-16 @enddesktop z-10 bg-white dark:bg-gradient-to-b dark:from-slate-600 dark:to-slate-700 border-slate-100 dark:border-black/10 bg-clip-padding text-slate-900 dark:text-slate-200 border-b text-sm font-medium py-2 text-center" id="sticky3">
            <span class="uppercase font-light">
                {{ Illuminate\Support\Str::limit($week['day'], 3, '') }} 
            </span>
            <br>
            <span class="font-semibold">
                {{ \Carbon\Carbon::parse($week['date'])->format('d') }}
            </span>
        </div>
        @endif
            
        @php
            $col++;
        @endphp
        @endforeach
        
        @php
        $row = 2; // Mulai dari baris kedua
        @endphp
        @foreach ($timeMapping as $letter => $time)
            <div class="row-start-[{{ $row }}] col-start-[1] border-slate-100 dark:border-slate-200/5 border-r border-b text-xs text-center align-middle text-slate-400 uppercase sticky left-0 bg-white dark:bg-slate-800 font-medium sticky left-0">{{ $letter }}</div>
            @php
                $col = 2;
            @endphp
            @foreach ($weekDates as $week)
                <div class="row-start-[{{ $row }}] col-start-[{{ $col }}] border-slate-100 dark:border-slate-200/5 border-b border-r "></div>
            @php
                $col++;
            @endphp
            @endforeach
            @php
            $row++;
            @endphp
        @endforeach
        
        <!-- Calendar contents -->

         @php
            $totalRowspan = 1;
        @endphp

        @foreach ($classSchedule as $class)
        @php
            $totalRowspan = ceil((strtotime($class['end_time']) - strtotime($class['start_time'])) / 3600);
        @endphp
            <div class="{{ $dayClass[$class['day']] }} {{ $timeMappings[$class['start_time']] }} row-span-{{ $totalRowspan }} bg-purple-400/20 dark:bg-sky-600/50 border border-purple-700/10 dark:border-sky-500 rounded-lg m-1 p-2 flex flex-col">
                <span
                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-neutral-50 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-neutral-600 w-fit">
                Kuliah
                </span>
                <span class="mt-1 font-medium text-purple-600 dark:text-sky-100">{{ $class['subject'] }}</span>
                <span class="text-xs mt-1 text-purple-600 dark:text-sky-100">{{ $class['start_time'] }} - {{ $class['end_time'] }}</span>
        </div>
        @endforeach

        @foreach ($labsBooking as $booking)
        @php
            $totalRowspan = ceil((strtotime($booking['end_time']) - strtotime($booking['start_time'])) / 3600);
        @endphp
        <div class="{{ $dayClass[$booking['day']] }} {{ $timeMappings[$booking['start_time']] }} row-span-{{ $totalRowspan }} bg-blue-400/20 dark:bg-sky-600/50 border border-blue-700/10 dark:border-sky-500 rounded-lg m-1 p-2 flex flex-col" wire:key="{{ $booking->id }}">
            <span class="font-medium text-blue-600 dark:text-sky-100">{{ $booking['reason_to_booking'] }}</span>
            <span class="text-xs mt-1 text-blue-600">{{ $booking['user']['name'] }} </span>
            <span class="text-xs mt-1 text-blue-600 dark:text-sky-100">{{ $booking['start_time'] }} - {{ $booking['end_time'] }}</span>
        </div>
        @endforeach

        
      </div>
      @auth
            @include('components.modal-button')
        @else
        <a href="{{ route('login') }}" type="button"  style="background-color: #172554"
        class="rounded-xl bg-blue-950 p-2 drop-shadow-md text-4xl border border-blue-100 fixed bottom-0 right-0 mb-6 mr-6"
        data-te-toggle="tooltip"
        title="Booking Ruangan">
            <i class="bi bi-plus-lg text-white"></i>
        </a>
        @endauth
    </div>
    
</div>
