<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        return redirect('/pengiriman');
    }
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/login', [AuthController::class, 'login'])->name('login.verify');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('pegawai', EmployeeController::class);
    Route::post('/pegawai/kirim-email/{id}', [EmployeeController::class, 'sendEmail'])->name('pegawai.email');
});

Route::middleware('auth')->group(function () {
    Route::resource('siswa', StudentController::class);
    Route::resource('pengiriman', ShipmentController::class);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
