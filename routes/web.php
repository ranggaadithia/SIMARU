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
use App\Http\Controllers\PasswordController;
use Database\Seeders\ClassSchedulesSeeder;

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
Route::get('/labs/{lab:slug}', [LabController::class, 'show'])->name('lab.view');

Route::middleware('auth')->group(function () {
    Route::post('/', [LabBookingController::class, 'store'])->name('booking');
    Route::get('accept/{request_reschedule}', [RescheduleController::class, 'acceptReschedule']);
    Route::delete('labs-booking/{labs_booking}', [LabBookingController::class, 'destroy'])->name('labs-booking.destroy');

    Route::get('/change-password', [PasswordController::class, 'showChangePasswordForm']);
    Route::post('/change-password', [PasswordController::class, 'changePassword'])->name('change.password');
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
    Route::get('lecturer', [RegisterController::class, 'index']);
    Route::post('lecturer', [RegisterController::class, 'register'])->name('register');
    Route::resource('labs', LabController::class);
    Route::resource('class-schedule', ClassScheduleController::class)->except(('show'));
    Route::get('class-schedule/list', [ClassScheduleController::class, 'list'])->name('class-schedule.list');
    Route::get('reschedule/', [RescheduleController::class, 'index'])->name('reschedule.index');
    Route::get('reschedule/{labs_booking}', [RescheduleController::class, 'create'])->name('reschedule.create');
    Route::post('reschedule/{labs_booking}', [RescheduleController::class, 'store'])->name('reschedule.store');
    Route::get('report', Report::class)->name('report');
});

Route::get('/test', function () {
    return view('test', [
        'labs' => Lab::all(),
        'days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        'alphabet' => ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M']
    ]);
});
