<div>
    <div class="grid grid-cols-[70px,repeat(7,auto)] grid-rows-[repeat(14,50px)] mt-16">
        {{-- {{ dd($labsBooking) }} --}}
        <div class="row-start-[1] col-start-[1] sticky top-16 z-10 bg-white dark:bg-gradient-to-b dark:from-slate-600 dark:to-slate-700 border-slate-100 dark:border-black/10 bg-clip-padding text-slate-900 dark:text-slate-200 border-b text-sm font-medium py-2"></div>
        @php
            $col = 2;
        @endphp
        @foreach ($weekDates as $week)
            <div class="row-start-[1] col-start-[{{ $col }}] sticky top-16 z-10 bg-white dark:bg-gradient-to-b dark:from-slate-600 dark:to-slate-700 border-slate-100 dark:border-black/10 bg-clip-padding text-slate-900 dark:text-slate-200 border-b text-sm font-medium py-2 text-center">{{ $week['date'] }}</div>
        @php
            $col++;
        @endphp
        @endforeach
        
        @php
        $row = 2; // Mulai dari baris kedua
        @endphp
        @foreach ($timeMapping as $letter => $time)
            <div class="row-start-[{{ $row }}] col-start-[1] border-slate-100 dark:border-slate-200/5 border-r border-b text-xs text-center align-middle text-slate-400 uppercase sticky left-0 bg-white dark:bg-slate-800 font-medium">{{ $letter }}</div>
            @php
                $col = 2;
            @endphp
            @foreach ($weekDates as $week)
                <div class="row-start-[{{ $row }}] col-start-[{{ $col }}] border-slate-100 dark:border-slate-200/5 border-b border-r"></div>
            @php
                $col++;
            @endphp
            @endforeach
            @php
            $row++;
            @endphp
        @endforeach
        
        <!-- Calendar contents -->
        @foreach ($classSchedule as $item)
            <div class="{{ $dayClass[$item['day']] }} {{ $timeMappings[$item['start_time']] }} row-span-3 bg-blue-400/20 dark:bg-sky-600/50 border border-blue-700/10 dark:border-sky-500 rounded-lg m-1 p-1 flex flex-col">
            <span class="text-xs text-blue-600 dark:text-sky-100">{{ $item['start_time'] }}</span>
            <span class="text-xs font-medium text-blue-600 dark:text-sky-100">{{ $item['subject'] }}</span>
            <span class="text-xs text-blue-600 dark:text-sky-100">{{ $item['class'] }}</span>
        </div>
        @endforeach

        @foreach ($labsBooking as $booking)
        <div class="{{ $dayClass[$booking['day']] }} {{ $timeMappings[$booking['start_time']] }} row-span-3 bg-blue-400/20 dark:bg-sky-600/50 border border-blue-700/10 dark:border-sky-500 rounded-lg m-1 p-1 flex flex-col">
            <span class="text-xs text-blue-600 dark:text-sky-100">{{ $booking['start_time'] }}</span>
            <span class="text-xs font-medium text-blue-600 dark:text-sky-100">{{ $booking['reason_to_booking'] }}</span>
        </div>
        @endforeach

        
      </div>
    </div>
</div>
