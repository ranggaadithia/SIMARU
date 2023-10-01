<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\LabsBooking;
use App\Utilities\TimeMappings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::check() ? Auth::user() : null;
        $labs = Lab::all();
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
        return $request;
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
        //
    }
}
