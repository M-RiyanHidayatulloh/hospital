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
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserAppointmentsController;
use App\Http\Controllers\UserOnlineConsultationController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/bookappointment', [BookController::class, 'index'])->name('user/appointment');
Route::get('/bookappointment/{id}/edit', [BookController::class, 'edit'])->name('user/editappointment');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::post('/updateProfile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
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


require __DIR__.'/auth.php';



Route::get('/user', [UserDashboardController::class, 'index'])->name('user.dashboard.index');
Route::get('user/appointments', [UserAppointmentsController::class, 'index'])->name('user.appointments.index');
Route::get('/online', [UserOnlineConsultationController::class, 'index'])->name('user.OnlineConsultation.index');
