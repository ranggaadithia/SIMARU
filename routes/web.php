<?php

use App\Models\User;
use App\Models\Status;
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
Route::get('/test_user_status', function () {
    $user = User::find(4);
    return $user->status->title;
});
Route::get('/test_status_users', function () {
    $status = Status::find(1);
    return $status->users;
});
