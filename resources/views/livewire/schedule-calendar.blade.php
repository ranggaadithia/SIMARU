
<div class="wrapper" id="scrollContainer">
    <table class="mt-16 mx-auto">
        <thead class="transition-shadow ease-in-out duration-300 bg-white" id="thead">
            <tr class="sticky top-16 shadow-lg z-40">
                <th class="py-2 border-r h-10 bg-blue-950">
                    @auth
                        {{-- @include('components.modal-button') --}}
                    @else 
                    <a href="{{ route('login') }}" type="button" class="rounded-full bg-white p-2 text-blue-950 drop-shadow-md text-4xl border border-blue-100"
                    data-te-toggle="tooltip"
                    title="Booking Ruangan"><i class="bi bi-plus-lg"></i></a>
                    @endauth
                </th>
                @foreach ($weekDates as $week)
                    <th class="md:p-2 border-r h-24 lg:w-40 px-16 bg-blue-950 text-white box-border">
                        @if ($week['date'] == $today)
                        <span class="uppercase text-white">
                            {{ Illuminate\Support\Str::limit($week['day'], 3, '') }} 
                        </span>
                        <br>
                        <span class="text-3xl font-normal text-white">
                            {{ \Carbon\Carbon::parse($week['date'])->format('d') }}
                        </span>
                        @else
                        <span class="uppercase">
                            {{ Illuminate\Support\Str::limit($week['day'], 3, '') }} 
                        </span>
                        <br>
                        <span class="text-3xl font-normal">
                            {{ \Carbon\Carbon::parse($week['date'])->format('d') }}
                        </span>
                        @endif
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="">
            @foreach ($labs as $lab)
                <tr class="text-center h-20" wire:key="{{ $lab->id }} ">
                    <td class="border px-3 lg:px-3 h-40 items-center bg-blue-950 lg:w-40 sticky left-0 z-0" id="lab-name">
                    <a href="{{ route('lab.view', $lab->slug) }}">
                        <div class="h-40 mx-auto flex justify-center items-center">
                            <div class="">
                                <span class="font-bold text-white">R. {{ str_replace('Ruang ', '', $lab->name) }}</span>
                            </div>
                        </div>
                    </a>
                    </td>
                    @foreach ($weekDates as $week)
                        <td class="border h-40 bg-white transition cursor-pointer duration-500 ease hover:bg-gray-300">
                            <button class="p-0 m-0 w-full h-full box-border"
                                @click="open = ! open" 
                                wire:click="getLabScheduleDetail({{ $lab->id }}, '{{ $week['date'] }}', '{{ $week['day'] }}')"
                            >
                                <div class="flex flex-col h-40 mx-auto sm:w-full">
                                    <div class="bottom flex-grow w-full cursor-pointer">
                                        <div class="overflow-hidden px-1 box-border">
                                            @foreach ($lab->users as $user)
                                                @if ($user->pivot->booking_date === $week['date'])
                                                    <div class="w-full rounded-md bg-blue-400/20 p-1 my-1 border-blue-700/10" wire:key="{{ $user->id }}">
                                                        <p class="text-left text-blue-600 text-sm">
                                                            {{ Illuminate\Support\Str::limit($user->pivot->reason_to_booking, 13) }}
                                                        </p>
                                                    </div>
                                                @endif
                                            @endforeach
                                            @foreach ($lab->classSchedules as $classSchedule)
                                                @if ($classSchedule->day == $week['day'])
                                                    <div class="w-full rounded-md bg-purple-400/20 p-1 my-1 border-purple-700/10" wire:key="{{ $classSchedule->id }}">
                                                        <p class="text-left text-purple-600 text-sm">
                                                            {{ Illuminate\Support\Str::limit($classSchedule->subject, 13) }}
                                                        </p>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
        @include('components.modal-button')
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






