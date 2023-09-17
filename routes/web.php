<?php

use App\Models\Lab;
use App\Models\User;
use App\Models\LabsBooking;
use Illuminate\Support\Facades\DB;
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
    $user = User::find(3);
    $lab = Lab::find(4);


    $user->labs()->attach($lab->id, ['booking_date' => today(), 'start_time' => 'G', 'end_time' => 'I']);
    return "success";
});

Route::get('/lab', function () {

    $labId = 1; // Ganti dengan ID lab yang Anda inginkan

    $labBookings = LabsBooking::where('user_id', $labId)->get();


    foreach ($labBookings as $key => $value) {
        echo $value->lab->name;
    }
});
