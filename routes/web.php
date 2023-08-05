<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MusicBand\Musicbands;
use App\Http\Livewire\MusicBand\Booking;
use App\Http\Livewire\MusicBand\Dashboard;


use App\Http\Livewire\Login\Login;
use App\Http\Controllers\AuthController;
use App\Http\Livewire\Setting\Profile;
use App\Http\Livewire\Setting\Account;


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
Route::get('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ('auth')], function() {

    Route::get('/profile', [Profile::class, 'profile']);
    Route::get('/account', [Account::class, 'account']);
    Route::get('music-band/{id}/{musicband}', Booking::class)->name('music-band.booking');
    Route::post('music-band/{id}/{musicband}/send-request', [Booking::class, 'sendRequest'])->name('music-band.booking.sendRequest');
    Route::get('/dashboard', [Dashboard::class, 'dashboard']);


    Route::get('/', [Musicbands::class, 'index']);


});

