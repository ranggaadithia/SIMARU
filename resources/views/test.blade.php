@extends('layouts.index')

@section('container')

  <div class="overflow-scroll grid grid-cols-[70px,repeat(7,180px)] grid-rows-[repeat(14,50px)] max-h-[90vh]">
    
    <div class="row-start-[1] col-start-[1] sticky top-0 z-10 bg-white dark:bg-gradient-to-b dark:from-slate-600 dark:to-slate-700 border-slate-100 dark:border-black/10 bg-clip-padding text-slate-900 dark:text-slate-200 border-b text-sm font-medium py-2"></div>
    @foreach ($days as $index => $day)
        <div class="row-start-[1] col-start-[{{ $index + 2 }}] sticky top-0 z-10 bg-white dark:bg-gradient-to-b dark:from-slate-600 dark:to-slate-700 border-slate-100 dark:border-black/10 bg-clip-padding text-slate-900 dark:text-slate-200 border-b text-sm font-medium py-2 text-center">{{ $day }}</div>
    @endforeach
    
    @php
    $row = 2; // Mulai dari baris kedua
    @endphp
    @foreach ($alphabet as $letter)
        <div class="row-start-[{{ $row }}] col-start-1 border-slate-100 dark:border-slate-200/5 border-r border-b text-xs p-1.5 text-right text-slate-400 uppercase sticky left-0 bg-white dark:bg-slate-800 font-medium">{{ $letter }}</div>
        @foreach ($days as $index => $day)
            <div class="row-start-[{{ $row }}] col-start-[{{ $index + 2 }}] border-slate-100 dark:border-slate-200/5 border-b border-r"></div>
        @endforeach
        @php
        $row++;
        @endphp
    @endforeach
    
    <!-- Calendar contents -->
    <div class="row-start-[5] col-start-[2] row-span-3 bg-blue-400/20 dark:bg-sky-600/50 border border-blue-700/10 dark:border-sky-500 rounded-lg m-1 p-1 flex flex-col">
      <span class="text-xs text-blue-600 dark:text-sky-100">5 AM</span>
      <span class="text-xs font-medium text-blue-600 dark:text-sky-100">Flight to vancouver</span>
      <span class="text-xs text-blue-600 dark:text-sky-100">Toronto YYZ</span>
    </div>
    <div class="row-start-[3] col-start-[4] row-span-3 bg-purple-400/20 dark:bg-fuchsia-600/50 border border-purple-700/10 dark:border-fuchsia-500 rounded-lg m-1 p-1 flex flex-col">
      <span class="text-xs text-purple-600 dark:text-fuchsia-100">6 AM</span>
      <span class="text-xs font-medium text-purple-600 dark:text-fuchsia-100">Breakfast</span>
      <span class="text-xs text-purple-600 dark:text-fuchsia-100">Mel's Diner</span>
    </div>
    
  </div>
</div>

<div class="mt-4"></div>

@endsection