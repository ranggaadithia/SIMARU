
<div class="wrapper">
    <table class="overflow-x-scroll xl:w-full mt-16 mx-auto">
        <thead class="sticky top-16 transition-shadow ease-in-out duration-300 bg-white" id="thead">
            <tr class="">
                <th class="py-2 border-r h-10 md:w-30 sm:w-20  xl:text-sm text-xs bg-white text-white lg:w-50">
                    {{-- @auth
                        <livewire:modal-booking :user="Auth::user()" :labs="$labs" :timeMappings="$timeMappings"  />
                    @endauth --}}
                </th>
                @foreach ($weekDates as $week)
                    <th class="p-2 border-r h-24 w-40 bg-white text-gray-600">
                        <span class="uppercase">
                            {{ Illuminate\Support\Str::limit($week['day'], 3, '') }} 
                        </span>
                        <br>
                        <span class="text-3xl font-normal">
                            {{ \Carbon\Carbon::parse($week['date'])->format('d') }}
                        </span>
                        
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="overflow-y-scroll">
            @foreach ($labs as $lab)
                <tr class="text-center h-20 w-10" wire:key="{{ $lab->id }} ">
                    <td class="border lg:px-3 h-40 w-32 items-center bg-blue-400 overflow-hidden">
                        <div class="h-40 md:w-30 sm:w-full w-10 mx-auto flex justify-center items-center">
                            <div class="top h-5 p-0 -mx-4">
                                <span class="font-bold text-white">{{ $lab->name }}</span>
                            </div>
                        </div>
                    </td>
                    @foreach ($weekDates as $week)
                        <td class="border h-40 max-w-30  transition cursor-pointer duration-500 ease hover:bg-gray-300 ">
                        <button class="p-0 m-0 w-full h-full box-border"
                        @click="open = ! open" 
                        wire:click="getLabScheduleDetail({{ $lab->id }}, '{{ $week['date'] }}', '{{ $week['day'] }}')"
                        >
                            <div class="flex flex-col h-40 mx-auto sm:w-full">
                                <div class="bottom flex-grow w-full cursor-pointer">
                                    <div class="overflow-hidden pl-4 box-border">
                                        @foreach ($lab->users as $user)
                                            @if ($user->pivot->booking_date === $week['date'])
                                                <div class="flex w-fit" wire:key="{{ $user->id }}">
                                                    <span>|</span>
                                                    <p class="text-left ml-1">
                                                        {{ Illuminate\Support\Str::limit($user->pivot->reason_to_booking, 10) }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach
                                        @foreach ($lab->classSchedules as $classSchedule)
                                            @if ($classSchedule->day == $week['day'])
                                                <div class="flex w-fit" wire:key="{{ $classSchedule->id }}">
                                                    <span>|</span>
                                                    <p class="text-left ml-1">
                                                        {{ Illuminate\Support\Str::limit($classSchedule->subject, 10) }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </button>
                        <!--Extra large modal-->                           
                        </td>
                        
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

@teleport('body')
    <livewire:detail-schedule lazy />
@endteleport

@push('scripts')
    <script>
        window.addEventListener("scroll", function () {
            const nav = document.getElementById("thead");
            if (window.scrollY > 10) {
                nav.classList.add("shadow-md");
            } else {
                nav.classList.remove("shadow-md");
            }
        });

    </script>
@endpush
</div>






