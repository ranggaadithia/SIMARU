<div>
    <div x-show="open" class="relative z-40" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modalScheduleDetail">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl w-full">
                <button @click="open = ! open" class="absolute right-3 top-2 text-2xl"><i class="bi bi-x-circle"></i></button>
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="mt-3 sm:ml-4 sm:mt-0 sm:text-left">
                            @if ($labName)
                                <h1 class="text-2xl font-semibold">{{ $labName->name }}</h1>
                                <h3 class="font-semibold capitalize" id="modal-title">{{ $day }}, {{ \Carbon\Carbon::parse($date)->format('d M Y') }}</h3>
                            @else
                            <div class="animate-pulse">
                                <div class="h-7 bg-gray-400 w-32"></div>
                            </div>
                            @endif

                            <div class="mt-2">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <tbody>
                                        @foreach ($timeMappings as $key => $value)
                                            
                                        
                                        @php
                                        $found = false;
                                        $totalRowspan = 1;
                                        @endphp
                                
                                        @foreach ($labBookings as $booking)
                                            @if ($booking['start_time'] == $value[0])
                                            @php
                                                $totalRowspan = ceil((strtotime($booking['end_time']) - strtotime($booking['start_time'])) / 3600);
                                            @endphp
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $key }}
                                                    </th>
                                                    <td class="w-full bg-blue-600  rounded-lg p-3 text-white align-top" rowspan="{{ $totalRowspan }}">
                                                        <div class="flex justify-between">
                                                            <div class="">
                                                                <h1 class="text-2xl font-semibold">{{ $booking->reason_to_booking }}</h1>
                                                                <p class="text-sm font-light mt-1">{{ $booking->user->name }} ({{ $booking->user->role }})</p>
                                                                <p class="mt-3">{{ $booking->start_time }} - {{ $booking->end_time }}</p>
                                                            </div>
                                                            @auth
                                                                @if (Auth::user()->role === 'admin')
                                                                    <div class="align-middle">
                                                                        <a href="{{ route('reschedule.create', $booking->id) }}" class="py-3 px-5 rounded-full bg-white text-black block">Reschedule</a>
                                                                    </div>
                                                                @endif
                                                            @endauth
                                                        </div>
                                                    </td>
                                                </tr>
                                                @php
                                                $found = true;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @foreach ($classSchedule as $class)
                                            @if ($class['start_time'] == $value[0])
                                            @php
                                                $totalRowspan = ceil((strtotime($class['end_time']) - strtotime($class['start_time'])) / 3600);
                                            @endphp
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $key }}
                                                    </th>
                                                    <td class="w-full bg-purple-600 rounded-lg p-3 text-white align-top" rowspan="{{ $totalRowspan }}">
                                                        <div class="flex justify-between">
                                                            <div class="">
                                                                <span
                                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-neutral-50 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-neutral-600">
                                                                    Kuliah
                                                                </span>
                                                                <h1 class="text-2xl font-semibold">{{ $class->subject }}</h1>
                                                                <p class="text-sm font-light mt-1">{{ $class->lecturer }}</p>
                                                                <p class="mt-3">{{ $class->start_time }} - {{ $class->end_time }}</p>
                                                            </div>
                                                            @auth
                                                                @if (Auth::user()->role === 'admin')
                                                                    <div class="align-middle">
                                                                        <a href="{{ route('class-schedule.edit', $class->id) }}" class="py-3 px-5 rounded-full bg-white text-black block">Edit Jadwal</a>
                                                                    </div>
                                                                @endif
                                                            @endauth
                                                        </div>
                                                    </td>
                                                </tr>
                                                @php
                                                $found = true;
                                                @endphp
                                            @endif
                                        @endforeach
                                
                                        @if (!$found)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $key }}
                                                </th>
                                                <td class="w-full">
                                                    <!-- Isi jika tidak ada booking -->
                                                </td>
                                            </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
