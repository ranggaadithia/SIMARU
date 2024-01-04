<div class="table-responsive">
    <input wire:model.live="search" type="text" placeholder="Search by room name" class="form-control my-4 mx-2 w-50">
    <table class="table table-bordered w-screen">
        <thead>
            <tr class="bg-light-gray text-center">
                <th class="text-uppercase">Ruang/Hari<br /></th>
                @foreach ($days as $day)
                  <th class="text-uppercase">{{ $day }}<br /></th>
                @endforeach
            </tr>
        </thead>
        <tbody>
          @foreach ($labs as $lab)
            <tr>
                <td class="align-middle">{{ $lab->name }}</td>
                @foreach ($days as $day)
                  <td class="position-relative">
                    @foreach ($classSchedules as $schedule)
                    @if ($schedule->lab_id == $lab->id && $schedule->day == strtolower($day))
                      <div class="margin-10px-top font-size14">
                        <a href="{{ route('class-schedule.edit', $schedule->id) }}">
                          <span class="text-light-gray">| </span>
                            ({{ App\Utilities\TimeMappings::convertToLetter($schedule->start_time) }} - {{ App\Utilities\TimeMappings::convertToLetter($schedule->end_time) }})
                            <strong>
                              {{ $schedule->subject }}
                            </strong>
                           ({{ $schedule->lecturer }})
                        </a>
                          
                      </div>
                      
                      @endif
                    @endforeach
                  </td>
                @endforeach
            </tr>
          @endforeach
        </tbody>
    </table>
</div>