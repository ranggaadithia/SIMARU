<?php

use App\Models\ClassSchedule;
use App\Models\Lab;
use App\Models\User;
use App\Models\LabsBooking;
use App\Models\RescheduleRequest;
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
    return view('welcome');
});





// route testing below
Route::get('/test_booking', function () {
    $user = User::find(9);
    $lab = Lab::find(1);


    $user->labs()->attach($lab->id, ['booking_date' => today(), 'start_time' => 'D', 'end_time' => 'F', 'reason' => 'penelitian']);
    return "success";
});


Route::get('/test_reschedule', function () {

    RescheduleRequest::create([
        'lab_booking_id' => 3,
        'user_id' => 3,
        'new_booking_date' => Carbon::tomorrow(),
        'new_start_time' => 'A',
        'new_end_time' => 'C',
        'reason_for_request' => 'Maintenece',
        'status' => 'requested'
    ]);

    return "success";
});

// lab dashboard
Route::get('/lab', function () {
    $labBookings = LabsBooking::all();

    $rescheduleRequest = RescheduleRequest::all();

    $days = [];

    foreach ($labBookings as $booking) {
        $carbonDate = Carbon::parse($booking->booking_date);
        $day = $carbonDate->format('l');
        $days[] = $day;
    }


    return view('test', compact('labBookings', 'days', 'rescheduleRequest'));
});


// if user auth
Route::get('/user/{id}', function (string $id) {
    $reschduleRequest = RescheduleRequest::where('user_id', $id)->where('status', 'requested')->get();

    if (!empty($reschduleRequest)) {
        return "Jadwal Anda di Reschdule";
    } else {
        return "aman";
    }
});



Route::get('/class_schedule', function () {
    $class_schedule = ClassSchedule::all();
    return $class_schedule[0]->lab->name;
});
