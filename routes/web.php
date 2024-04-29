<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\KategoriController;
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
Route::get('/register', [TamuController::class, 'RegistrationForm'])->name('register');
Route::post('/register', [TamuController::class, 'register']);
Route::get('/login', [TamuController::class, 'loginForm'])->name('login');
Route::post('/login', [TamuController::class, 'login']);

Route::get('/index', [TamuController::class, 'search'])->name('search');

Route::get('/tamu', [TamuController::class, 'index'])->name('index');
Route::get('/tamu/create', [TamuController::class, 'create'])->name('tamu.create');
Route::post('/tamu', [TamuController::class, 'store'])->name('tamu.store');
Route::get('/tamu/{tamu}/edit', [TamuController::class, 'edit'])->name('tamu.edit');
Route::put('/tamu/{tamu}', [TamuController::class, 'update'])->name('tamu.update');
Route::delete('/tamu/{tamu}', [TamuController::class, 'destroy'])->name('tamu.destroy');


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);


Route::get('/tamus/SeluruhTamu', [TamuController::class, 'dailyTotal'])->name('tamus.daily');
Route::get('/tamus/weekly', [TamuController::class, 'weeklyTotal'])->name('tamus.weekly');
Route::get('/tamus/monthly', [TamuController::class, 'monthlyTotal'])->name('tamus.monthly');
Route::get('/tamus/yearly', [TamuController::class, 'yearlyTotal'])->name('tamus.yearly');
Route::get('/tamus/total', [TamuController::class, 'yearlyTotal'])->name('tamus.yearly');

// nampilin data tamu
Route::get('/tamus/tamuHariIni', [TamuController::class, 'tamuHariIni'])->name('tamu.harian');
Route::get('/tamus/tamuMingguIni', [TamuController::class, 'tamuMingguan'])->name('tamu.mingguan');
Route::get('/tamus/tamuBulanIni', [TamuController::class, 'tamuBulanan'])->name('tamu.bulanan');
Route::get('/tamus/tamuTahunIni', [TamuController::class, 'tamuTahunan'])->name('tamu.tahunan');