<?php

namespace App\Http\Controllers;

use App\Models\LabsBooking;
use Illuminate\Http\Request;

class LabScheduleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $events = [];
        $bookings = LabsBooking::with('lab', 'user')->get();

        foreach ($bookings as $booking) {
            $events[] = [
                'title' => $booking->user->name,
                'start' => "$booking->booking_date $booking->start_time",
                'end' => "$booking->booking_date $booking->end_time"
            ];
        }

        return view('lab.index', compact('events'));
    }
}
