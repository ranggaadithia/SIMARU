<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\WithAttributes;
use App\Models\Lab;
use Livewire\Component;

class ScheduleCalendar extends Component
{

    // use WithAttributes;

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

    public $weekDates, $startDate, $labs;

    public $currentWeek = 1;

    public function nextWeek()
    {
        $this->currentWeek++;
        $this->mount();
    }

    public function previousWeek()
    {
        $this->currentWeek--;
        $this->mount();
    }

    public function mount()
    {
        $this->startDate = Carbon::now()->startOfWeek()->addWeeks($this->currentWeek - 1);
        $this->weekDates = $this->generateWeekDates($this->startDate, $this->startDate->copy()->addDays(6));
    }

    public function render()
    {
        return view('livewire.schedule-calendar');
    }
}
