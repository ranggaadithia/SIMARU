<?php

namespace App\Livewire;

use view;
use Carbon\Carbon;
use App\Models\Lab;
use Livewire\Component;

class NavbarLab extends Component
{
    public $startDate, $weekDates, $lab, $title;
    public $currentWeek = 1;

    public function mount()
    {
        $this->startDate = Carbon::now()->startOfWeek()->addWeeks($this->currentWeek - 1);
        $this->title = $this->lab->name;
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
        return view('livewire.navbar-lab', compact('labs'));
    }
}
