<?php

namespace App\Livewire;

use App\Models\Lab;
use Livewire\Component;

class ClassSchedule extends Component
{
    public $search = '';

    public $days, $classSchedules;

    public function mount($days, $classSchedules)
    {
        $this->days = $days;
        $this->classSchedules = $classSchedules;
    }

    public function render()
    {
        $labs = Lab::where('name', 'like', '%' . $this->search . '%')->get();

        return view('livewire.class-schedule', [
            'labs' => $labs,
        ]);
    }
}
