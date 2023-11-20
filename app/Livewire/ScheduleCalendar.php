<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Lab;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithAttributes;

class ScheduleCalendar extends Component
{

    // use WithAttributes;

    private function generateWeekDates(Carbon $startDate, Carbon $endDate)
    {
        Carbon::setLocale('id');
        $weekDates = [];

        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $weekDates[] = [
                'date' => $date->toDateString(),
                'day' => strtolower($date->format('l')),
            ];
        }

        return $weekDates;
    }

    public $weekDates, $startDate, $labs, $timeMapping, $today;

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
        $this->today = Carbon::now()->toDateString();
    }

    #[On('success-booking')]
    public function updateSchedule($schedule)
    {
    }

    // public $week;

    public function getLabScheduleDetail($labId, $date, $day)
    {

        $data = Lab::with(['users', 'classSchedules'])->where('id', $labId)->get();


        $this->dispatch('show-detail-schedule', $labId, $date, $day, $data);
    }

    public function render()
    {
        return view('livewire.schedule-calendar');
    }
}
