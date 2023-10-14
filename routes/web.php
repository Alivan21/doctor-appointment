<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
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

Route::group(['middleware' => 'role: 1'], function () {
  Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
  })->name('admin.dashboard');

  Route::get('/admin/doctor', [DoctorController::class, 'index'])->name('doctor');
  Route::get('/admin/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
  Route::post('/admin/doctors', [DoctorController::class, 'store'])->name('doctors.store');
  Route::get('/admin/doctors/{user}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
  Route::put('/admin/doctors/{user}', [DoctorController::class, 'update'])->name('doctors.update');
  Route::delete('/admin/doctors/{user}', [DoctorController::class, 'destroy'])->name('doctors.destroy');

  Route::get('/admin/client', [ClientController::class, 'index'])->name('client');

  Route::get('/admin/session', [SessionController::class, 'index'])->name('session');
  Route::get('/admin/session/create', [SessionController::class, 'create'])->name('session.create');
  Route::post('/admin/session/store', [SessionController::class, 'store'])->name('session.store');
  Route::get('/admin/session/{session}/edit', [SessionController::class, 'edit'])->name('session.edit');
  Route::put('/admin/session/{session}', [SessionController::class, 'update'])->name('session.update');
  Route::delete('/admin/session/{session}', [SessionController::class, 'destroy'])->name('session.destroy');
});

Route::group(['middleware' => 'role: 3'], function () {
  Route::get('/user/dashboard', function () {
    return view('user.dashboard');
  })->name('user.dashboard');
});

Route::group(['middleware' => 'role:1,2,3'], function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
