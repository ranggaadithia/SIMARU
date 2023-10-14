<?php

namespace App\Livewire;

use App\Models\LabsBooking;
use Livewire\Component;
use Livewire\WithPagination;

class Report extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.report', [
            'bookings' => LabsBooking::with('lab', 'user')->orderBy('booking_date', 'desc')->paginate(10)
        ]);
    }
}