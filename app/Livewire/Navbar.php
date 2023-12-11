<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Lab;
use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
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

    public $startDate, $weekDates;
    public $currentWeek = 1;

    public function mount()
    {
        $this->startDate = Carbon::now()->startOfWeek()->addWeeks($this->currentWeek - 1);
    }

    public function prevWeek()
    {
        $this->dispatch('prevWeek');
        $this->currentWeek--;
        $this->mount();
    }
    public function nextWeek()
    {
        $this->dispatch('nextWeek');
        $this->currentWeek++;
        $this->mount();
    }
    public function render()
    {
        $labs = Lab::all();
        return view('livewire.navbar', compact('labs'));
    }
}
