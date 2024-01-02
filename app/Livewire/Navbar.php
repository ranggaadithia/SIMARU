<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Lab;
use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
{
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
        return view('livewire.navbar');
    }
}
