<?php

namespace App\Http\Controllers;

use App\Models\LabsBooking;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function history()
    {
        $histories = LabsBooking::with('lab')->where('user_id', auth()->user()->id)->orderBy('booking_date', 'desc')->get();
        return view('home.history', compact('histories'));
    }
}
