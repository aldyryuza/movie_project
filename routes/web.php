<?php

use App\Http\Controllers\bookingController;
use App\Http\Controllers\karyawanController;
use App\Http\Controllers\listKursi;
use App\Http\Controllers\listKursiController;
use App\Http\Controllers\loginControler;
use App\Http\Controllers\movieController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\registrasiController;
use App\Http\Controllers\showController;
use App\Http\Controllers\showSeatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});


// Routing Movie
Route::get('/movie', [movieController::class, 'index']);
Route::get('/movie/data', [movieController::class, 'create']);
Route::get('/movie/{id}', [movieController::class, 'show']);
Route::get('/movie/edit/{id}', [movieController::class, 'edit']);

Route::post('/movie/upload', [movieController::class, 'store']);
Route::post('/movie/update', [movieController::class, 'update']);
Route::delete('/movie/delete/{id}', [movieController::class, 'destroy']);


// Routing Karyawan
Route::get('/karyawan', [karyawanController::class, 'index']);
Route::post('/karyawan/upload', [karyawanController::class, 'store']);
Route::get('/karyawan/edit/{id}', [karyawanController::class, 'edit']);
Route::post('/karyawan/update/{id}', [karyawanController::class, 'update']);
Route::delete('/karyawan/delete/{id}', [karyawanController::class, 'destroy']);


// Routing Login User
Route::get('/login', [loginControler::class, 'index'])->middleware('guest');
Route::post('/login', [loginControler::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [loginControler::class, 'logout'])->middleware('auth');


// Routing Testing

Route::get('/register', [registrasiController::class, 'index']);
Route::post('/register/upload', [registrasiController::class, 'store']);


// Routing Pembelian Tiket
Route::get('/pemesanan/tiket/{id}', [movieController::class, 'beliTiket']);


// Routing List Kursi
Route::get('/list-kursi', [listKursiController::class, 'index']);

// Routing Show Movie
Route::get('/show', [showController::class, 'index']);
Route::get('/show-Movies', [showController::class, 'create']);
Route::get('/show/edit/{id}', [showController::class, 'edit']);
Route::post('/show/upload', [showController::class, 'store']);
Route::post('/show/update/{id}', [showController::class, 'update']);
Route::delete('/show/delete/{id}', [showController::class, 'destroy']);

// Routing Show seat

Route::get('/show_seat', [showSeatController::class, 'index']);

// Routing Booking

Route::post('/booking', [bookingController::class, 'store']);
Route::get('/tiket', [bookingController::class, 'index']);


// Routing Payment
Route::get('/pembayaran', [paymentController::class, 'index']);

// Routing List Pembayaran USer
Route::get('/booking-list', [bookingController::class, 'create']);


Route::get('/user', function () {
    return view('content.user.dataUser');
});
