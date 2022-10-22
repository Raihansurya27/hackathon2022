<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PeranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KomensController;
use App\Http\Controllers\BookingsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'home']);
Route::get('dashboard',function(){
    return view('dashboard.index');
})->middleware('auth');
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register',[LoginController::class,'registerStore']);
Route::get('/login',[LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::resource('acara', AcaraController::class)->middleware('auth');
Route::resource('booking', BookingController::class)->middleware('auth');
Route::resource('jabatan', JabatanController::class)->middleware('auth');
Route::resource('karyawan', KaryawanController::class)->middleware('auth');
Route::resource('komentar', KomentarController::class)->middleware('auth');
Route::resource('menu', MenuController::class)->middleware('auth');
Route::resource('tipe', TipeController::class)->middleware('auth');;
Route::resource('peran', PeranController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
Route::resource('komens',KomensController::class)->middleware('auth');
Route::resource('bookings',BookingsController::class);
Route::resource('transaksi', TransaksiController::class)->middleware('auth');
