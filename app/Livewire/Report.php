<?php

namespace App\Livewire;

use App\Models\LabsBooking;
use App\Utilities\TimeMappings;
use Livewire\Component;
use Livewire\WithPagination;

class Report extends Component
{

    public function render()
    {
        return view('livewire.report', [
            'bookings' => LabsBooking::with('lab', 'user')->orderBy('booking_date', 'desc')->get()
        ]);
    }
}
