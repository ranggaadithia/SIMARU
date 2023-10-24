<?php

namespace App\Livewire;

use App\Models\Lab;
use Livewire\Component;
use App\Models\LabsBooking;
use Livewire\Attributes\On;
use App\Models\ClassSchedule;
use App\Utilities\TimeMappings;

class DetailSchedule extends Component
{

    public $labId, $date, $day;

    #[On('show-detail-schedule')]
    public function showModalDetail($labId, $date, $day)
    {
        $this->labId = $labId;
        $this->date = $date;
        $this->day = $day;
    }

    public function placeholder()
    {
        return view('livewire.loading');
    }

    public function render()
    {
        return view('livewire.detail-schedule', [
            'labId' => $this->labId,
            'labName' => Lab::find($this->labId),
            'date' => $this->date,
            'day' => $this->day,
            'labBookings' => LabsBooking::where('lab_id', $this->labId)
                ->where('booking_date', $this->date)->with('user')
                ->get(),
            'classSchedule' => ClassSchedule::where('lab_id', $this->labId)
                ->where('day', $this->day)->get(),
            'timeMappings' => TimeMappings::$timeMappings,
        ]);
    }
}
