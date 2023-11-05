<?php

namespace App\Livewire;

use App\Models\ClassSchedule;
use App\Models\LabsBooking;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;
use Mpdf\Tag\Time;
use App\Utilities\TimeMappings;

class LabSchedule extends Component
{
    private function generateWeekDates(Carbon $startDate, Carbon $endDate)
    {
        $weekDates = [];

        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $weekDates[] = [
                'date' => $date->toDateString(),
                'day' => strtolower($date->format('l')),
            ];
        }

        return $weekDates;
    }

    public $weekDates, $startDate, $lab, $timeMappings, $dayClass, $today;

    public $currentWeek = 1;

    #[On('nextWeek')]
    public function nextWeek()
    {
        $this->currentWeek++;
        $this->mount();
    }

    #[On('prevWeek')]
    public function previousWeek()
    {
        $this->currentWeek--;
        $this->mount();
    }

    public function mount()
    {
        $this->startDate = Carbon::now()->startOfWeek()->addWeeks($this->currentWeek - 1);
        $this->weekDates = $this->generateWeekDates($this->startDate, $this->startDate->copy()->addDays(6));
        $this->dayClass = [
            'monday' => 'col-start-[2]',
            'tuesday' => 'col-start-[3]',
            'wednesday' => 'col-start-[4]',
            'thursday' => 'col-start-[5]',
            'friday' => 'col-start-[6]',
            'saturday' => 'col-start-[7]',
            'sunday' => 'col-start-[8]',
        ];

        $this->timeMappings = [
            '07:30:00' => 'row-start-[2]',
            '08:30:00' => 'row-start-[3]',
            '09:30:00' => 'row-start-[4]',
            '10:30:00' => 'row-start-[5]',
            '11:30:00' => 'row-start-[6]',
            '12:30:00' => 'row-start-[7]',
            '13:30:00' => 'row-start-[8]',
            '14:30:00' => 'row-start-[9]',
            '15:30:00' => 'row-start-[10]',
            '16:30:00' => 'row-start-[11]',
            '17:30:00' => 'row-start-[12]',
            '18:30:00' => 'row-start-[13]',
            '19:30:00' => 'row-start-[14]',
        ];

        $this->today = Carbon::now()->toDateString();
    }
    public function render()
    {

        $dataBooking = LabsBooking::where('lab_id', $this->lab->id)->with('user')->get();

        $this->mount();

        $filteredData = $this->filterDataByWeek($dataBooking);

        return view('livewire.lab-schedule', [
            'timeMapping' => TimeMappings::$timeMappings,
            'classSchedule' => ClassSchedule::where('lab_id', $this->lab->id)->get(),
            'labsBooking' => $filteredData,
            'title' => $this->lab->name,
        ]);
    }

    private function filterDataByWeek($data)
    {
        $filteredData = [];

        foreach ($data as $item) {
            $bookingDate = $item['booking_date'];

            // Periksa apakah $bookingDate berada dalam minggu saat ini
            if ($this->isBookingDateInCurrentWeek($bookingDate)) {
                $filteredData[] = $item;
            }
        }

        return $filteredData;
    }

    private function isBookingDateInCurrentWeek($bookingDate)
    {
        $startDate = Carbon::now()->startOfWeek()->addWeeks($this->currentWeek - 1);
        $endDate = $startDate->copy()->addDays(6);

        return $bookingDate >= $startDate->toDateString() && $bookingDate <= $endDate->toDateString();
    }
}
