<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\LabsBooking;

class BookingHistory extends Component
{
    public $now, $upcomingHistories, $expiredHistories, $totalRecords;
    public $loadAmount = 5;

    public function loadMore()
    {
        $this->loadAmount += 10;
    }

    public function mount()
    {
        $this->now = Carbon::now();

        $this->upcomingHistories = LabsBooking::with('lab')
            ->where('user_id', auth()->user()->id)
            ->where(function ($query) {
                $query->where('booking_date', '>', $this->now->format('Y-m-d'))
                    ->orWhere(function ($subquery) {
                        $subquery->where('booking_date', '=', $this->now->format('Y-m-d'))
                            ->where('start_time', '>', $this->now->format('H:i:s'));
                    });
            })
            ->orderBy('booking_date', 'asc')
            ->get();

        $this->expiredHistories = LabsBooking::with('lab')
            ->where('user_id', auth()->user()->id)
            ->where(function ($query) {
                $query->where('booking_date', '<', $this->now->format('Y-m-d'))
                    ->orWhere(function ($subquery) {
                        $subquery->whereDate('booking_date', '=', $this->now->format('Y-m-d'))
                            ->whereTime('start_time', '<', $this->now->format('H:i:s'));
                    });
            })
            ->orderBy('booking_date', 'desc')
            ->paginate($this->loadAmount);

        $this->totalRecords = LabsBooking::count();
    }

    public function cancelBooking($id)
    {
        $booking = LabsBooking::find($id);
        $booking->delete();
    }

    public function render()
    {
        return view('livewire.booking-history', [
            'expiredHistories' => LabsBooking::with('lab')
                ->where('user_id', auth()->user()->id)
                ->where(function ($query) {
                    $query->where('booking_date', '<', $this->now->format('Y-m-d'))
                        ->orWhere(function ($subquery) {
                            $subquery->whereDate('booking_date', '=', $this->now->format('Y-m-d'))
                                ->whereTime('start_time', '<', $this->now->format('H:i:s'));
                        });
                })
                ->orderBy('booking_date', 'desc')
                ->paginate($this->loadAmount),
        ]);
    }
}
