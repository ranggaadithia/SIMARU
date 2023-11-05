@extends('layouts.index')

@section('container')
<h1 class="text-center m-5 font-bold text-2xl">Histori Booking Ruangan</h1>
<div class="block mx-28  rounded-lg  shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 p-2 mt-5 mb-2 ">
    <h1 class=" text-xl font-bold ml-[17px] text-neutral-600 dark:text-neutral-200 text-center">Mendatang</h1>
</div>
@foreach ($upcomingHistories as $history)
<div class="block mx-28  rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 mt-3">
    <div class="border-b-2 border-neutral-100 px-6 py-3 dark:border-neutral-600 dark:text-neutral-50 text-xl font-semibold">
            {{ $history->reason_to_booking }}
        </div>
        <div class="p-6">
            <h5 class="mb-2 text-lg font-medium leading-tight text-neutral-600 dark:text-neutral-200">
                {{ \Carbon\Carbon::parse($history->booking_date)->format('d F Y') }}
                ({{ \Carbon\Carbon::parse($history->booking_date)->diffForHumans()}})
            </h5>
            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                {{ $history->start_time }} - {{ $history->end_time }}
            </p>
            <button type="button" href="#"
            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
            data-te-ripple-init data-te-ripple-color="light">
            Reschedule
        </button>
        <button type="button" href="#"
            class="inline-block rounded bg-red-500 px-6 pb-2 pt-2.5 text-xs font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
            data-te-ripple-init data-te-ripple-color="light">
            Cancel
        </button>
        </div>
    </div>
@endforeach


<div class="block mx-28  rounded-lg bg-gray-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 p-2 mt-5 mb-2 ">
    
    <h1 class=" text-xl font-bold ml-[17px] text-neutral-600 dark:text-neutral-200 text-center">Selesai</h1>
</div>
@foreach ($expiredHistories as $history)
<div class="block mx-28  rounded-lg bg-gray-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 mt-3">
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