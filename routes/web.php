<?php

use Carbon\Carbon;
use App\Models\Lab;
use App\Models\User;
use App\Livewire\Report;
use App\Exports\ExportUser;
use App\Models\LabsBooking;
use Illuminate\Http\Request;
use App\Models\ClassSchedule;
use App\Utilities\TimeMappings;
use App\Models\RescheduleRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LabBookingController;
use App\Http\Controllers\RescheduleController;
use App\Http\Controllers\LabScheduleController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\HistoryController;

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

Route::get('/', [LabBookingController::class, 'index'])->name('home');
Route::get('/history', [HistoryController::class, 'history'])->name('history');
Route::get('/labs', LabScheduleController::class);
Route::get('/labs/{lab:slug}', [LabController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::post('/', [LabBookingController::class, 'store'])->name('booking');
    Route::get('accept/{request_reschedule}', [RescheduleController::class, 'acceptReschedule']);
});


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/dashboard', function () {
    return redirect('/dashboard/labs');
});
Route::middleware(['auth', 'is.admin'])->prefix('dashboard')->group(function () {
    Route::resource('labs', LabController::class);
    Route::resource('class-schedule', ClassScheduleController::class)->except(('show'));
    Route::get('reschedule/{labs_booking}', [RescheduleController::class, 'create'])->name('reschedule.create');
    Route::post('reschedule/{labs_booking}', [RescheduleController::class, 'store'])->name('reschedule.store');
    Route::get('report', Report::class)->name('report');
});





// route testing below
Route::get('/time', function () {
    return TimeMappings::$timeMappings;
});

Route::get('/export', function () {
    return Excel::download(new ExportUser, 'users.xlsx');
});

Route::get('/test', function () {
    return view('test', [
        'labs' => Lab::all(),
        'days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        'alphabet' => ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M']
    ]);
});


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
