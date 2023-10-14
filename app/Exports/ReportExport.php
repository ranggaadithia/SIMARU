<?php

namespace App\Exports;

use App\Models\LabsBooking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $bookings = LabsBooking::with('lab', 'user')->orderBy('booking_date', 'desc')->get();
        return view('dashboard.reports.excel', [
                'bookings' => $bookings
            ]
        );
    }
}
