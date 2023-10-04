<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lab;
use App\Models\LabsBooking;
use Illuminate\Http\Request;
use App\Utilities\TimeMappings;
use App\Models\RescheduleRequest;
use Illuminate\Support\Facades\Auth;

class RescheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $labsBookingId)
    {
        $id = $labsBookingId;
        $booking = LabsBooking::where('id', $labsBookingId)->first();
        $labs = Lab::all();
        $time_format = TimeMappings::$timeMappings;
        return view('dashboard.reschedule.create', compact('id', 'booking', 'labs', 'time_format'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $labsBookingId)
    {
        $booking = LabsBooking::find($labsBookingId);
        $data = [
            'lab_booking_id' => $booking->id,
            'user_id' => $booking->user->id,
            'new_lab_id' => $request->new_lab_id,
            'new_booking_date' => $request->new_booking_date,
            'new_start_time' => $request->new_start_time,
            'new_end_time' => $request->new_end_time,
            'reason_for_request' => $request->reason_for_request,
            'status' => 'requested'
        ];
        RescheduleRequest::create($data);
    }

    public function acceptReschedule(string $rescheduleId)
    {
        $reschedule = RescheduleRequest::find($rescheduleId);

        if ($reschedule->status == 'accepted') {
            return "link false";
        } else if (Auth::user()->id != $reschedule->user_id) {
            return "unauthorize";
        }

        $booking = LabsBooking::find($reschedule->lab_booking_id);
        $booking->lab_id = $reschedule->new_lab_id;
        $booking->booking_date = $reschedule->new_booking_date;
        $booking->day = Carbon::createFromFormat('Y-m-d', $reschedule->new_booking_date)->format('l');
        $booking->start_time = $reschedule->new_start_time;
        $booking->end_time = $reschedule->new_end_time;
        $booking->save();

        $reschedule->status = 'accepted';
        $reschedule->save();

        return "suceess";
    }

    /**
     * Display the specified resource.
     */
    public function show(RescheduleRequest $rescheduleRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RescheduleRequest $rescheduleRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RescheduleRequest $rescheduleRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RescheduleRequest $rescheduleRequest)
    {
        //
    }
}
