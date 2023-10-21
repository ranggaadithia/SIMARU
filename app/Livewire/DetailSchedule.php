<?php

namespace App\Livewire;

use App\Models\ClassSchedule;
use App\Models\LabsBooking;
use Livewire\Component;
use Livewire\Attributes\On;
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

    public function render()
    {
        return view('livewire.detail-schedule', [
            'labId' => $this->labId,
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
