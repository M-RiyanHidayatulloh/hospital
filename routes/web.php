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
use App\Http\Controllers\UserScheduleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserAppointmentsController;
use App\Http\Controllers\UserMedicalRecordController;
use App\Http\Controllers\UserOnlineConsultationController;


// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/', [HomeController::class, 'home'])->name('home');
// Route::get('/bookappointment', [BookController::class, 'index'])->name('user/appointment');
// Route::get('/bookappointment/{id}/edit', [BookController::class, 'edit'])->name('user/editappointment');

Route::middleware(['auth', 'verified', 'user'])->group(function () {
    Route::get('users/dashboard', [HomeController::class, 'user'])->name('dashboard');
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::post('/updateProfile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // Route::group(['middleware' => ['auth', 'doctor']], function () {
    //     Route::resource('my_schedule', DoctorScheduleController::class);
    // });

    Route::middleware(['auth', 'verified', 'doctor'])->group(function () {
        Route::get('doctors/dashboard', [HomeController::class, 'doctor'])->name('doctor/dashboard');
    });

    // Route::group(['middleware' => ['auth', 'doctor']], function () {
    //     Route::resource('my_schedule', DoctorScheduleController::class);
    // });

    Route::middleware(['auth', 'verified', 'admin'])->group(function () {
        Route::get('admin/dashboard', [HomeController::class, 'admin'])->name('admin/dashboard');
        Route::get('/admin/schedules', [DoctorScheduleController::class, 'index'])->name('admin/schedules');
        Route::get('/admin/schedules/create', [DoctorScheduleController::class, 'create'])->name('admin/schedules/create');
        Route::post('/admin/schedules/store', [DoctorScheduleController::class, 'store'])->name('admin/schedules/store');
        Route::get('/admin/schedules/edit/{id}', [DoctorScheduleController::class, 'edit'])->name('admin/schedules/edit');
        Route::put('/admin/schedules/edit/{id}', [DoctorScheduleController::class, 'update'])->name('admin/schedules/update');
        Route::get('admin/schedules/delete/{id}', [DoctorScheduleController::class, 'delete'])->name('admin/schedules/delete');

        Route::get('/admin/doctors', [DoctorController::class, 'index'])->name('admin/doctors');
        Route::get('/admin/doctors/create', [DoctorController::class, 'create'])->name('admin/doctors/create');
        Route::post('/admin/doctors/store', [DoctorController::class, 'store'])->name('admin/doctors/store');
        Route::get('admin/doctors/edit/{id}', [DoctorController::class, 'edit'])->name('admin/doctors/edit');
        Route::put('/admin/doctors/edit/{id}', [DoctorController::class, 'update'])->name('admin/doctors/update');
        Route::get('admin/doctors/delete/{id}', [DoctorController::class, 'delete'])->name('admin/doctors/delete');
        Route::get('admin/doctors/trash', [DoctorController::class, 'trash'])->name('admin/doctors/trash');
        Route::get('admin/doctors/restore/{id?}', [DoctorController::class, 'restore'])->name('admin/doctors/restore');
        Route::get('admin/doctors/destroy/{id?}', [DoctorController::class, 'destroy'])->name('admin/doctors/destroy');

        Route::get('/admin/appointments', [AppointmentController::class, 'index'])->name('admin/appointments');
        Route::get('/admin/appointments/create', [AppointmentController::class, 'create'])->name('admin/appointments/create');
        Route::post('/admin/appointments/store', [AppointmentController::class, 'store'])->name('admin/appointments/store');
        Route::get('admin/appointments/edit/{id}', [AppointmentController::class, 'edit'])->name('admin/appointments/edit');
        Route::put('/admin/appointments/edit/{id}', [AppointmentController::class, 'update'])->name('admin/appointments/update');
        Route::get('admin/appointments/delete/{id}', [AppointmentController::class, 'delete'])->name('admin/appointments/delete');

        Route::get('/admin/patients', [PatientController::class, 'index'])->name('admin/patients');
        Route::get('/admin/patients/create', [PatientController::class, 'create'])->name('admin/patients/create');
        Route::post('/admin/patients/store', [PatientController::class, 'store'])->name('admin/patients/store');
        Route::get('admin/patients/edit/{id}', [PatientController::class, 'edit'])->name('admin/patients/edit');
        Route::put('/admin/patients/edit/{id}', [PatientController::class, 'update'])->name('admin/patients/update');
        Route::get('admin/patients/delete/{id}', [PatientController::class, 'delete'])->name('admin/patients/delete');

        Route::get('/admin/queues', [QueueController::class, 'index'])->name('admin/queues');
        Route::get('/admin/queues/create', [QueueController::class, 'create'])->name('admin/queues/create');
        Route::post('/admin/queues/store', [QueueController::class, 'store'])->name('admin/queues/store');
        Route::get('/admin/queues/edit/{id}', [QueueController::class, 'edit'])->name('admin/queues/edit');
        Route::put('/admin/queues/edit/{id}', [QueueController::class, 'update'])->name('admin/queues/update');
        Route::get('/admin/queues/delete/{id}', [QueueController::class, 'delete'])->name('admin/queues/delete');

        Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin/rooms');
        Route::get('/admin/rooms/create', [RoomController::class, 'create'])->name('admin/rooms/create');
        Route::post('/admin/rooms/store', [RoomController::class, 'store'])->name('admin/rooms/store');
        Route::get('/admin/rooms/edit/{id}', [RoomController::class, 'edit'])->name('admin/rooms/edit');
        Route::put('/admin/rooms/edit/{id}', [RoomController::class, 'update'])->name('admin/rooms/update');
        Route::get('/admin/rooms/delete/{id}', [RoomController::class, 'delete'])->name('admin/rooms/delete');

        Route::get('/admin/online_consultations', [OnlineConsultationController::class, 'index'])->name('admin/online_consultations');
        Route::get('/admin/online_consultations/create', [OnlineConsultationController::class, 'create'])->name('admin/online_consultations/create');
        Route::post('/admin/online_consultations/store', [OnlineConsultationController::class, 'store'])->name('admin/online_consultations/store');
        Route::get('/admin/online_consultations/edit/{id}', [OnlineConsultationController::class, 'edit'])->name('admin/online_consultations/edit');
        Route::put('/admin/online_consultations/edit/{id}', [OnlineConsultationController::class, 'update'])->name('admin/online_consultations/update');
        Route::get('/admin/online_consultations/delete/{id}', [OnlineConsultationController::class, 'delete'])->name('admin/online_consultations/delete');

        Route::get('/admin/medical_records', [MedicalRecordController::class, 'index'])->name('admin/medical_records');
        Route::get('/admin/medical_records/create', [MedicalRecordController::class, 'create'])->name('admin/medical_records/create');
        Route::post('/admin/medical_records/store', [MedicalRecordController::class, 'store'])->name('admin/medical_records/store');
        Route::get('/admin/medical_records/edit/{id}', [MedicalRecordController::class, 'edit'])->name('admin/medical_records/edit');
        Route::put('/admin/medical_records/edit/{id}', [MedicalRecordController::class, 'update'])->name('admin/medical_records/update');
        Route::get('/admin/medical_records/delete/{id}', [MedicalRecordController::class, 'delete'])->name('admin/medical_records/delete');

        Route::get('/admin/payments', [PaymentController::class, 'index'])->name('admin/payments');
        Route::get('/admin/payments/create', [PaymentController::class, 'create'])->name('admin/payments/create');
        Route::post('/admin/payments/store', [PaymentController::class, 'store'])->name('admin/payments/store');
        Route::get('/admin/payments/edit/{id}', [PaymentController::class, 'edit'])->name('admin/payments/edit');
        Route::put('/admin/payments/edit/{id}', [PaymentController::class, 'update'])->name('admin/payments/update');
        Route::get('/admin/payments/delete/{id}', [PaymentController::class, 'delete'])->name('admin/payments/delete');

        Route::get('/admin/health_informations', [HealthInformationController::class, 'index'])->name('admin/health_informations');
        Route::get('/admin/health_informations/create', [HealthInformationController::class, 'create'])->name('admin/health_informations/create');
        Route::post('/admin/health_informations/store', [HealthInformationController::class, 'store'])->name('admin/health_informations/store');
        Route::get('/admin/health_informations/edit/{id}', [HealthInformationController::class, 'edit'])->name('admin/health_informations/edit');
        Route::put('/admin/health_informations/edit/{id}', [HealthInformationController::class, 'update'])->name('admin/health_informations/update');
        Route::get('/admin/health_informations/delete/{id}', [HealthInformationController::class, 'delete'])->name('admin/health_informations/delete');

    });

    Route::middleware(['auth'])->group(function () {
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
        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });




});


require __DIR__ . '/auth.php';



Route::get('/user', [UserDashboardController::class, 'index'])->name('user.dashboard.index');
Route::get('/about', [UserDashboardController::class, 'about'])->name('about2');
Route::get('/contact', [UserDashboardController::class, 'contact'])->name('contact2');
Route::get('/doctor_schedule', [UserScheduleController::class, 'index'])->name('doctor_schedule');
Route::get('user/appointments', [UserAppointmentsController::class, 'index'])->name('user.appointments.index');
Route::get('user/medicalrecord', [UserMedicalRecordController::class, 'index'])->name('user.medicalrecord.index');
Route::get('/online', [UserOnlineConsultationController::class, 'index'])->name('user.OnlineConsultation.index');
