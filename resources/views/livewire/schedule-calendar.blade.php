
    <div class="wrapper bg-white rounded shadow mt-10">
        <div class="header flex justify-between border-b p-2">
            <span class="text-lg font-bold p-2">
                {{ $startDate->format('F Y') }}
            </span>

        <div class="flex items-center lg:mr-3">
          <button class="p-1" wire:click="previousWeek">
            <i class="bi bi-arrow-left-circle"></i>
          </button>
          <button class="p-1" wire:click="nextWeek">
            <i class="bi bi-arrow-right-circle"></i>
          </button>
        </div>
      </div>
        <table class="overflow-x-scroll xl:w-full lg:overflow-x-hidden">
            <thead>
                <tr>
                    <th class="py-2 border-r h-10 md:w-30 sm:w-20 w-10 xl:text-sm text-xs bg-blue-500 text-white lg:w-50">
                        <span class="xl:block lg:block md:block sm:block hidden">Ruangan<br>Hari</span>
                        <span class="xl:hidden lg:hidden md:hidden sm:hidden block bg-blue-500 text-white">Ruangan<br>Hari</span>
                    </th>
                    @foreach ($weekDates as $week)
                        <th class="p-2 border-r h-10 lg:w-50 md:w-30 sm:w-20 w-10 xl:text-sm text-sm bg-blue-400 text-white">
                            <span class="xl:block lg:block md:block sm:block hidden">{{ $week['day'] }}, {{ $week['date'] }}</span>
                            <span class="xl:hidden lg:hidden md:hidden sm:hidden block bg-blue-400 text-white">{{ $week['day'] }}, {{ $week['date'] }}</span>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($labs as $lab)
                    <tr class="text-center h-20">
                        <td class="border lg:px-3 h-40 md:w-30 sm:w-20 items-center bg-blue-300 overflow-hidden">
                            <div class="h-40 md:w-30 sm:w-full w-10 mx-auto flex justify-center items-center">
                                <div class="top h-5 p-0 -mx-4">
                                    <span class="font-bold text-white">{{ $lab->name }}</span>
                                </div>
                            </div>
                        </td>
                        @foreach ($weekDates as $week)
                            <td class="border h-40 xl:w-20 lg:w-20 md:w-30 sm:w-20 w-10 transition cursor-pointer duration-500 ease hover:bg-gray-300">
                                <div class="flex flex-col h-40 mx-auto sm:w-full">
                                    <div class="bottom flex-grow w-full cursor-pointer">
                                        <div class="overflow-hidden pl-4 box-border">
                                            @foreach ($lab->users as $user)
                                                @if ($user->pivot->booking_date === $week['date'])
                                                    <div class="flex w-fit">
                                                        <span>|</span>
                                                        <p class="text-left ml-1">
                                                            {{ $user->pivot->reason_to_booking }}
                                                        </p>
                                                    </div>
                                                @endif
                                            @endforeach
                                            @foreach ($lab->classSchedules as $classSchedule)
                                                @if ($classSchedule->day == $week['day'])
                                                    <div class="flex w-fit">
                                                        <span>|</span>
                                                        <p class="text-left ml-1">
                                                            (Kuliah) {{ $classSchedule->subject }}
                                                        </p>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
