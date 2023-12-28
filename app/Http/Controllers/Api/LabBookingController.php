<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\LabsBooking;
use Illuminate\Http\Request;
use App\Models\ClassSchedule;
use App\Utilities\TimeMappings;
use App\Http\Controllers\Controller;
use App\Http\Resources\LabBookingResource;

class LabBookingController extends Controller
{
    public function index()
    {
        $bookings = LabsBooking::with(['user', 'lab'])->get();

        return new LabBookingResource(true, 'List of all bookings', $bookings);
    }

    public function store(Request $request)
    {
        $this->validate($request, LabsBooking::$rules);

        $day = Carbon::createFromFormat('d/m/Y', $request->booking_date)->format('l');

        $bookingDate = Carbon::createFromFormat('d/m/Y', $request->booking_date)->format('Y-m-d');

        $isBookingConflict = LabsBooking::isBookingConflict($request->lab_id, $bookingDate, $request->start_time, $request->end_time)->count() == 0;

        $isLabAvailable = ClassSchedule::isLabAvailable($request->lab_id, $day, $request->start_time, $request->end_time)->count() == 0;

        if (!$isBookingConflict) {
            return response()->json([
                'message' => 'Booking conflict',
            ], 409);
        } else if (!$isLabAvailable) {
            return response()->json([
                'message' => 'Lab is not available',
            ], 409);
        }

        $data = [
            'user_id' => $request->user_id,
            'lab_id' => $request->lab_id,
            'booking_date' => $bookingDate,
            'day' => $day,
            'start_time' => TimeMappings::getMapping($request->start_time)[0],
            'end_time' => TimeMappings::getMapping($request->end_time)[1],
            'reason_to_booking' => $request->reason_to_booking
        ];

        $booking = LabsBooking::create($data);
        return new LabBookingResource(true, 'Booking created successfully', $booking);
    }

    public function show($id)
    {
        $booking = LabsBooking::with(['user', 'lab'])->findOrFail($id);

        return new LabBookingResource(true, 'Booking details', $booking);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, LabsBooking::$rules);

        $day = Carbon::createFromFormat('d/m/Y', $request->booking_date)->format('l');

        $bookingDate = Carbon::createFromFormat('d/m/Y', $request->booking_date)->format('Y-m-d');

        $isBookingConflict = LabsBooking::isBookingConflict($request->lab_id, $bookingDate, $request->start_time, $request->end_time)->count() == 0;

        $isLabAvailable = ClassSchedule::isLabAvailable($request->lab_id, $day, $request->start_time, $request->end_time)->count() == 0;

        if (!$isBookingConflict) {
            return response()->json([
                'message' => 'Booking conflict',
            ], 409);
        } else if (!$isLabAvailable) {
            return response()->json([
                'message' => 'Lab is not available',
            ], 409);
        }

        $data = [
            'user_id' => $request->user_id,
            'lab_id' => $request->lab_id,
            'booking_date' => $bookingDate,
            'day' => $day,
            'start_time' => TimeMappings::getMapping($request->start_time)[0],
            'end_time' => TimeMappings::getMapping($request->end_time)[1],
            'reason_to_booking' => $request->reason_to_booking
        ];

        $booking = LabsBooking::findOrFail($id);
        $booking->update($data);

        return new LabBookingResource(true, 'Booking updated successfully', $booking);
    }

    public function destroy($id)
    {
        $booking = LabsBooking::findOrFail($id);
        $booking->delete();

        return new LabBookingResource(true, 'Booking deleted successfully', $booking);
    }
}
