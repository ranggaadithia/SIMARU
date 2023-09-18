<?php

use App\Models\ClassSchedule;
use App\Models\Lab;
use App\Models\User;
use App\Models\LabsBooking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('test');
});



// route testing below
Route::get('/test_booking', function () {
    $user = User::find(3);
    $lab = Lab::find(4);


    $user->labs()->attach($lab->id, ['booking_date' => today(), 'start_time' => 'G', 'end_time' => 'I']);
    return "success";
});

Route::get('/lab', function () {
    $labBookings = LabsBooking::all();

    $days = [];

    foreach ($labBookings as $booking) {
        $carbonDate = Carbon::parse($booking->booking_date);
        $day = $carbonDate->format('l');
        $days[] = $day;
    }


    return view('test', compact('labBookings', 'days'));
});

Route::get('/class_schedule', function () {
    $class_schedule = ClassSchedule::all();
    return $class_schedule[0]->lab->name;
});
