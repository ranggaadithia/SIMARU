<?php

namespace App\Livewire;

use Carbon\Carbon;

use Livewire\Component;
use App\Models\LabsBooking;
use App\Models\ClassSchedule;
use Livewire\Attributes\Rule;
use App\Utilities\TimeMappings;
use Illuminate\Support\Facades\Auth;

class ModalBooking extends Component
{

    public $labs, $user, $timeMappings;

    public function mount($labs, $user, $timeMappings)
    {
        $this->labs = $labs;
        $this->user = $user;
        $this->timeMappings = $timeMappings;
    }

    public $lab_id;
    public $reason_to_booking = '';
    public $booking_date = '';
    public $start_time = '';
    public $end_time = '';

    protected $rules = [
        'lab_id' => 'required',
        'reason_to_booking' => 'required',
        'booking_date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
    ];

    protected $messages = [
        'lab_id.required' => 'Please select a lab.',
        'reason_to_booking.required' => 'Please provide a reason for booking.',
        'booking_date.required' => 'Please select a booking date.',
        'start_time.required' => 'Please select a start time.',
        'end_time.required' => 'Please select an end time.',
    ];

    public function bookingLab()
    {

        $this->validate();

        $day = Carbon::createFromFormat('d/m/Y', $this->booking_date)->format('l');

        $bookingDate = Carbon::createFromFormat('d/m/Y', $this->booking_date)->format('Y-m-d');

        $isBookingConflict = LabsBooking::isBookingConflict($this->lab_id, $bookingDate, $this->start_time, $this->end_time)->count() == 0;

        $isLabAvailable = ClassSchedule::isLabAvailable($this->lab_id, $day, $this->start_time, $this->end_time)->count() == 0;

        if (!$isBookingConflict) {
            session()->flash('conflict', 'Pada tanggal dan jam tersebut lab sedang digunakan');
        } else if (!$isLabAvailable) {
            session()->flash('conflict', 'Pada hari dan jam tersebut sedang ada perkuliahan di lab');
        } else {

            $data = [
                'user_id' => Auth::user()->id,
                'lab_id' => $this->lab_id,
                'booking_date' => $bookingDate,
                'day' => $day,
                'start_time' => TimeMappings::getMapping($this->start_time)[0],
                'end_time' => TimeMappings::getMapping($this->end_time)[1],
                'reason_to_booking' => $this->reason_to_booking
            ];

            LabsBooking::create($data);


            $this->dispatch('close-modal');
            $this->dispatch('success-booking', schedule: $data['user_id']);
            $this->resetForm();
        }
    }

    public function resetForm()
    {
        $this->lab_id = '';
        $this->booking_date = '';
        $this->start_time = '';
        $this->end_time = '';
        $this->reason_to_booking = '';
    }


    public function render()
    {
        return view('livewire.modal-booking');
    }
}
