<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
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
  return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');

  Route::get('/admin/doctor', [DoctorController::class, 'index'])->name('doctor');
  Route::get('/admin/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
  Route::post('/admin/doctors', [DoctorController::class, 'store'])->name('doctors.store');
  Route::get('/admin/doctors/{user}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
  Route::put('/admin/doctors/{user}', [DoctorController::class, 'update'])->name('doctors.update');
  Route::delete('/admin/doctors/{doctor}', [DoctorController::class, 'destroy'])->name('doctors.destroy');

  Route::get('/admin/client', [ClientController::class, 'index'])->name('client');

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
