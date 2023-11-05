<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lab;
use App\Models\LabsBooking;
use Illuminate\Http\Request;
use App\Models\ClassSchedule;
use App\Utilities\TimeMappings;
use Illuminate\Support\Facades\Auth;

class LabBookingController extends Controller
{

    public function index()
    {

        $user = Auth::check() ? Auth::user() : null;
        $labs = Lab::with(['users', 'classSchedules'])->get();
        $timeMappings = TimeMappings::$timeMappings;


        return view('home.index', compact('labs', 'user', 'timeMappings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, LabsBooking::$rules);

        $day = Carbon::createFromFormat('d/m/Y', $request->booking_date)->format('l');

        $bookingDate = Carbon::createFromFormat('d/m/Y', $request->booking_date)->format('Y-m-d');

        $isBookingConflict = LabsBooking::isBookingConflict($request->lab_id, $bookingDate, $request->start_time, $request->end_time)->count() == 0;

        $isLabAvailable = ClassSchedule::isLabAvailable($request->lab_id, $day, $request->start_time, $request->end_time)->count() == 0;

        if (!$isBookingConflict) {
            return redirect('/')->with('error', 'ada booking');
        } else if (!$isLabAvailable) {
            return "ada kuliah";
        }

        $data = [
            'user_id' => Auth::user()->id,
            'lab_id' => $request->lab_id,
            'booking_date' => $bookingDate,
            'day' => $day,
            'start_time' => TimeMappings::getMapping($request->start_time)[0],
            'end_time' => TimeMappings::getMapping($request->end_time)[1],
            'reason_to_booking' => $request->reason_to_booking
        ];

        LabsBooking::create($data);
        return "success";
    }

    /**
     * Display the specified resource.
     */
    public function show(LabsBooking $labsBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LabsBooking $labsBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LabsBooking $labsBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LabsBooking $labsBooking)
    {
        $labsBooking->delete();
        return back()->with('success', 'Booking berhasil dihapus');
    }
}
