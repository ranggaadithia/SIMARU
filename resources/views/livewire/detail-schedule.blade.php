<div>
    <div x-show="open" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modalScheduleDetail">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl w-full">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-xl font-semibold leading-6 text-gray-900" id="modal-title">{{ $date }}, {{ $day }}</h3>
                            <div class="mt-2">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <tbody>
                                        @foreach ($timeMappings as $key => $value)
                                            
                                        
                                        @php
                                        $found = false;
                                        @endphp
                                
                                        @foreach ($labBookings as $booking)
                                            @if ($booking['start_time'] == $value[0])
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $key }}
                                                    </th>
                                                    <td class="w-full bg-red-400" rowspan="3">
                                                        <!-- Isi yang sesuai -->
                                                    </td>
                                                </tr>
                                                @php
                                                $found = true;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @foreach ($classSchedule as $class)
                                            @if ($class['start_time'] == $value[0])
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $key }}
                                                    </th>
                                                    <td class="w-full bg-blue-400" rowspan="3">
                                                        <!-- Isi yang sesuai -->
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
