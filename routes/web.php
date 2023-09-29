<?php

use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\ClassSchedule;
use App\Models\Lab;
use App\Models\User;
use App\Models\LabsBooking;
use App\Models\RescheduleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
})->name('home');


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'is.admin'])->prefix('dashboard')->group(function () {
    Route::resource('labs', LabController::class)->except('show');
    Route::resource('class-schedule', ClassScheduleController::class);
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
        'lab_booking_id' => 2,
        'user_id' => 1,
        'new_booking_date' => Carbon::tomorrow(),
        'new_start_time' => 'D',
        'new_end_time' => 'F',
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
    return $reschduleRequest = RescheduleRequest::where('user_id', $id)->where('status', 'requested')->get();

    // if (!empty($reschduleRequest)) {
    //     return "Jadwal Anda di Reschdule";
    // } else {
    //     return "aman";
    // }
});


Route::get('/class_schedule', function () {
    $class_schedule = ClassSchedule::all();
    return $class_schedule[0]->lab->name;
});


Route::get('/table', function () {
    return view('request_schedule.moveschadule');
});
