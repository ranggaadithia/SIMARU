
<div class="wrapper" id="contentScroll">
    <table class="mt-[73px] mx-auto w-full">
        <thead class="transition-shadow ease-in-out duration-300 bg-white" id="thead">
            <tr class="sticky top-[73px] shadow-lg z-40">
                <th class="py-2 border-r h-10 bg-blue-950 text-white">
                   Ruang
                </th>
                @foreach ($weekDates as $week)
                    <th class="md:p-2 border-r lg:h-24 h-20 lg:w-40 px-16 bg-blue-950 text-white box-border">
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
                                <span class="font-bold text-white">Ruang {{ str_replace('Ruang ', '', $lab->name) }}</span>
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
        
    </table>

    
    
@teleport('body')
    <livewire:detail-schedule lazy />
@endteleport

@push('scripts')
    <script>
  // Mendapatkan referensi ke elemen dengan ID myElement
  var myElement = document.getElementById('contentScroll');

  // Fungsi untuk menangani perubahan responsif
  function handleResponsiveOverflow() {
    // Mendapatkan lebar layar saat ini
    var windowWidth = window.innerWidth;

    // Menambah atau menghapus kelas sesuai dengan lebar layar
    if (windowWidth <= 767) { // Sesuaikan dengan breakpoint yang diinginkan
      myElement.classList.add('overflow-x-scroll');
    } else {
      myElement.classList.remove('overflow-x-scroll');
    }
  }

  // Panggil fungsi saat halaman dimuat
  handleResponsiveOverflow();

  // Tambahkan event listener untuk menanggapi perubahan ukuran layar
  window.addEventListener('resize', handleResponsiveOverflow);



    </script>
@endpush
</div>






