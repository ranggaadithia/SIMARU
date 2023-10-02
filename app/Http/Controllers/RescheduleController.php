<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\LabsBooking;
use Illuminate\Http\Request;
use App\Models\RescheduleRequest;
use App\Utilities\TimeMappings;

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
    public function store(Request $request)
    {
        return $request;
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
