<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\HealthInformationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\OnlineConsultationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['middleware' => ['auth', 'doctor']], function () {
        Route::resource('my_schedule', DoctorScheduleController::class);
    });

    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::resource('users', RegisteredUserController::class);
        Route::resource('patients', PatientController::class);
        Route::resource('doctors', DoctorController::class);
        Route::resource('rooms', RoomController::class);
        Route::resource('appointments', AppointmentController::class);
        Route::resource('queues', QueueController::class);
        Route::resource('medical_records', MedicalRecordController::class);
        Route::resource('payments', PaymentController::class);
        Route::resource('health_informations', HealthInformationController::class);
        Route::resource('online_consultations', OnlineConsultationController::class);
        Route::resource('doctor_schedules', DoctorScheduleController::class);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });



});


require __DIR__ . '/auth.php';




