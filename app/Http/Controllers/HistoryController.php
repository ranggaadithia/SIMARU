<?php

namespace App\Http\Controllers;

use App\Models\LabsBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function history()
    {
        $now = Carbon::now();

        $upcomingHistories = LabsBooking::with('lab')
            ->where('user_id', auth()->user()->id)
            ->whereDate('booking_date', '=', $now->format('Y-m-d'))
            ->orWhereDate('booking_date', '>', $now->format('Y-m-d'))
            ->whereTime('start_time', '>', $now->format('H:i:s'))
            ->orderBy('booking_date', 'desc')
            ->get();

        $expiredHistories = LabsBooking::with('lab')
            ->where('user_id', auth()->user()->id)
            ->where(function ($query) use ($now) {
                $query->where('booking_date', '<', $now)
                    ->orWhere(function ($query) use ($now) {
                        $query->whereDate('booking_date', '=', $now->format('Y-m-d'))
                            ->whereTime('start_time', '<=', $now->format('H:i:s'));
                    });
            })
            ->orderBy('booking_date', 'desc')
            ->get();

        return view('home.history', compact('upcomingHistories', 'expiredHistories'));
    }
}
