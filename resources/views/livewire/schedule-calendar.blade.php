
<div class="wrapper">
    <table class="overflow-x-scroll lg:w-full mt-16 mx-auto">
        <thead class="sticky top-16 transition-shadow ease-in-out duration-300 bg-white" id="thead">
            <tr class="">
                <th class="py-2 border-r h-10 bg-white text-white sticky z-30 left-0 md:static">
                    @auth
                        @include('components.modal-button')
                    @else 
                    <a href="{{ route('login') }}" type="button" class="rounded-full bg-white p-2 text-blue-600 drop-shadow-md text-4xl border border-blue-100"
                    data-te-toggle="tooltip"
                    title="Booking Lab"><i class="bi bi-plus-lg"></i></a>
                    @endauth
                </th>
                @foreach ($weekDates as $week)
                    <th class="md:p-2 border-r h-24 lg:w-40 px-16 bg-white text-gray-600">
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
                <tr class="text-center h-20" wire:key="{{ $lab->id }} ">
                    <td class="border px-3 lg:px-3 h-40 items-center bg-white" id="lab-name"
                    data-sticky="true">
                        <div class="h-40 mx-auto flex justify-center items-center">
                            <div class="">
                                <span class="font-bold text-blue-400">{{ $lab->name }}</span>
                            </div>
                        </div>
                    </td>
                    @foreach ($weekDates as $week)
                        <td class="border h-40 bg-white transition cursor-pointer duration-500 ease hover:bg-gray-300">
                            <button class="p-0 m-0 w-full h-full box-border"
                                @click="open = ! open" 
                                wire:click="getLabScheduleDetail({{ $lab->id }}, '{{ $week['date'] }}', '{{ $week['day'] }}')"
                            >
                                <div class="flex flex-col h-40 mx-auto sm:w-full">
                                    <div class="bottom flex-grow w-full cursor-pointer">
                                        <div class="overflow-hidden pl-4 box-border">
                                            @foreach ($lab->users as $user)
                                                @if ($user->pivot->booking_date === $week['date'])
                                                    <div class="flex w-full" wire:key="{{ $user->id }}">
                                                        <span>|</span>
                                                        <p class="text-left ml-1">
                                                            {{ Illuminate\Support\Str::limit($user->pivot->reason_to_booking, 10) }}
                                                        </p>
                                                    </div>
                                                @endif
                                            @endforeach
                                            @foreach ($lab->classSchedules as $classSchedule)
                                                @if ($classSchedule->day == $week['day'])
                                                    <div class="flex w-full" wire:key="{{ $classSchedule->id }}">
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


    const labs = document.querySelectorAll('[data-sticky="true"]');

    labs.forEach((lab) => {
    let isSticky = false;

    window.addEventListener('scroll', () => {
        if (window.scrollX > 0) {
    if (!isSticky) {
        lab.classList.add('sticky', 'left-0');
        isSticky = true;
    }
} else if (window.scrollY > 0) {
    if (isSticky) {
        lab.classList.remove('sticky', 'left-0');
        isSticky = false;
    }
}

    });
});
    </script>
@endpush
</div>






