<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\LabsBooking;
use Livewire\Attributes\On;


class Counter extends Component
{
    public $count = 5;


    public function loadMore()
    {
        $this->count += 5;
    }

    public function cancelBooking($id)
    {
        $booking = LabsBooking::find($id);
        $booking->delete();
    }

    public function render()
    {

        $now = Carbon::now();

        $upcomingHistories = LabsBooking::with('lab')
            ->where('user_id', auth()->user()->id)
            ->where(function ($query) use ($now) {
                $query->where('booking_date', '>=', $now->format('Y-m-d'))
                    ->orWhere(function ($subquery) use ($now) {
                        $subquery->where('booking_date', '=', $now->format('Y-m-d'))
                            ->where('start_time', '>', $now->format('H:i:s'));
                    });
            })
            ->orderBy('booking_date', 'asc')
            ->get();

        $expiredHistories = LabsBooking::with('lab')
            ->where('user_id', auth()->user()->id)
            ->where(function ($query) use ($now) {
                $query->where('booking_date', '<', $now->format('Y-m-d'))
                    ->orWhere(function ($subquery) use ($now) {
                        $subquery->whereDate('booking_date', '=', $now->format('Y-m-d'))
                            ->whereTime('start_time', '<', $now->format('H:i:s'));
                    });
            })
            ->orderBy('booking_date', 'desc')
            ->take($this->count)->get();


        return view('livewire.counter', compact('upcomingHistories', 'expiredHistories'));
    }
}
