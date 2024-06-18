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
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserScheduleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserAppointmentsController;
use App\Http\Controllers\UserMedicalRecordController;
use App\Http\Controllers\UserOnlineConsultationController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminPasswordController;
use App\Http\Controllers\UserInformationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserReviewController;


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
    Route::get('admin/profile', [AdminProfileController::class, 'edit'])->name('admin.dashboard.edit');
    Route::patch('admin/profile', [AdminProfileController::class, 'update'])->name('admin.dashboard.update');
    // Route::get('admin/password', [AdminPasswordController::class, 'edit'])->name('admin.password.edit');
    // Route::put('admin/password', [AdminPasswordController::class, 'update'])->name('admin.password.update');

    Route::middleware(['auth', 'verified', 'doctor'])->group(function () {
        Route::get('doctors/dashboard', [HomeController::class, 'doctor'])->name('doctor/dashboard');
    });

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
        Route::get('admin/schedules/trash', [DoctorScheduleController::class, 'trash'])->name('admin/schedules/trash');
        Route::get('admin/schedules/restore/{id?}', [DoctorScheduleController::class, 'restore'])->name('admin/schedules/restore');
        Route::get('admin/schedules/destroy/{id?}', [DoctorScheduleController::class, 'destroy'])->name('admin/schedules/destroy');

        Route::get('/admin/doctors', [DoctorController::class, 'index'])->name('admin/doctors');
        // Route::get('/admin/doctors/create', [DoctorController::class, 'create'])->name('admin/doctors/create');
        Route::get('/admin/doctors/create', [DoctorController::class, 'create'])->name('admin/doctors/create');
        // Route::post('/admin/doctors/store', [DoctorController::class, 'store'])->name('admin/doctors/store');
        Route::post('/admin/doctors/store', [DoctorController::class, 'store'])->name('admin/doctors/store');
        // Route::get('admin/doctors/edit/{id}', [DoctorController::class, 'edit'])->name('admin/doctors/edit');
        Route::get('/admin/doctors/edit/{id}', [DoctorController::class, 'edit'])->name('admin/doctors/edit');
        Route::put('/admin/doctors/edit/{id}', [DoctorController::class, 'update'])->name('admin/doctors/update');
        // Route::put('/admin/doctors/edit/{id}', [DoctorController::class, 'update'])->name('admin/doctors/update');
        Route::get('admin/doctors/delete/{id}', [DoctorController::class, 'delete'])->name('admin/doctors/delete');
        Route::get('admin/doctors/trash', [DoctorController::class, 'trash'])->name('admin/doctors/trash');
        // Route::get('admin/doctors/restore/{id?}', [DoctorController::class, 'restore'])->name('admin/doctors/restore');
        // Route::get('admin/doctors/destroy/{id?}', [DoctorController::class, 'destroy'])->name('admin/doctors/destroy');

        Route::get('/admin/appointments', [AppointmentController::class, 'index'])->name('admin/appointments');
        Route::get('/admin/appointments/create', [AppointmentController::class, 'create'])->name('admin/appointments/create');
        Route::post('/admin/appointments/store', [AppointmentController::class, 'store'])->name('admin/appointments/store');
        Route::get('admin/appointments/edit/{id}', [AppointmentController::class, 'edit'])->name('admin/appointments/edit');
        Route::put('/admin/appointments/edit/{id}', [AppointmentController::class, 'update'])->name('admin/appointments/update');
        Route::get('admin/appointments/delete/{id}', [AppointmentController::class, 'delete'])->name('admin/appointments/delete');
        Route::get('admin/appointments/trash', [AppointmentController::class, 'trash'])->name('admin/appointments/trash');
        Route::get('admin/appointments/restore/{id?}', [AppointmentController::class, 'restore'])->name('admin/appointments/restore');
        Route::get('admin/appointments/destroy/{id?}', [AppointmentController::class, 'destroy'])->name('admin/appointments/destroy');

        Route::get('/admin/patients', [PatientController::class, 'index'])->name('admin/patients');
        Route::get('/admin/patients/create', [PatientController::class, 'create'])->name('admin/patients/create');
        Route::post('/admin/patients/store', [PatientController::class, 'store'])->name('admin/patients/store');
        Route::get('admin/patients/edit/{id}', [PatientController::class, 'edit'])->name('admin/patients/edit');
        Route::put('/admin/patients/edit/{id}', [PatientController::class, 'update'])->name('admin/patients/update');
        Route::get('admin/patients/delete/{id}', [PatientController::class, 'delete'])->name('admin/patients/delete');
        Route::get('admin/patients/trash', [PatientController::class, 'trash'])->name('admin/patients/trash');
        Route::get('admin/patients/restore/{id?}', [PatientController::class, 'restore'])->name('admin/patients/restore');
        Route::get('admin/patients/destroy/{id?}', [PatientController::class, 'destroy'])->name('admin/patients/destroy');

        Route::get('/admin/queues', [QueueController::class, 'index'])->name('admin/queues');
        Route::get('/admin/queues/create', [QueueController::class, 'create'])->name('admin/queues/create');
        Route::post('/admin/queues/store', [QueueController::class, 'store'])->name('admin/queues/store');
        Route::get('/admin/queues/edit/{id}', [QueueController::class, 'edit'])->name('admin/queues/edit');
        Route::put('/admin/queues/edit/{id}', [QueueController::class, 'update'])->name('admin/queues/update');
        Route::get('/admin/queues/delete/{id}', [QueueController::class, 'delete'])->name('admin/queues/delete');
        Route::get('admin/queues/trash', [QueueController::class, 'trash'])->name('admin/queues/trash');
        Route::get('admin/queues/restore/{id?}', [QueueController::class, 'restore'])->name('admin/queues/restore');
        Route::get('admin/queues/destroy/{id?}', [QueueController::class, 'destroy'])->name('admin/queues/destroy');

        Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin/rooms');
        Route::get('/admin/rooms/create', [RoomController::class, 'create'])->name('admin/rooms/create');
        Route::post('/admin/rooms/store', [RoomController::class, 'store'])->name('admin/rooms/store');
        Route::get('/admin/rooms/edit/{id}', [RoomController::class, 'edit'])->name('admin/rooms/edit');
        Route::put('/admin/rooms/edit/{id}', [RoomController::class, 'update'])->name('admin/rooms/update');
        Route::get('/admin/rooms/delete/{id}', [RoomController::class, 'delete'])->name('admin/rooms/delete');
        Route::get('admin/rooms/trash', [RoomController::class, 'trash'])->name('admin/rooms/trash');
        Route::get('admin/rooms/restore/{id?}', [RoomController::class, 'restore'])->name('admin/rooms/restore');
        Route::get('admin/rooms/destroy/{id?}', [RoomController::class, 'destroy'])->name('admin/rooms/destroy');

        Route::get('/admin/online_consultations', [OnlineConsultationController::class, 'index'])->name('admin/online_consultations');
        Route::get('/admin/online_consultations/create', [OnlineConsultationController::class, 'create'])->name('admin/online_consultations/create');
        Route::post('/admin/online_consultations/store', [OnlineConsultationController::class, 'store'])->name('admin/online_consultations/store');
        Route::get('/admin/online_consultations/edit/{id}', [OnlineConsultationController::class, 'edit'])->name('admin/online_consultations/edit');
        Route::put('/admin/online_consultations/edit/{id}', [OnlineConsultationController::class, 'update'])->name('admin/online_consultations/update');
        Route::get('/admin/online_consultations/delete/{id}', [OnlineConsultationController::class, 'delete'])->name('admin/online_consultations/delete');
        Route::get('admin/online_consultations/trash', [OnlineConsultationController::class, 'trash'])->name('admin/online_consultations/trash');
        Route::get('admin/online_consultations/restore/{id?}', [OnlineConsultationController::class, 'restore'])->name('admin/online_consultations/restore');
        Route::get('admin/online_consultations/destroy/{id?}', [OnlineConsultationController::class, 'destroy'])->name('admin/online_consultations/destroy');

        Route::get('/admin/medical_records', [MedicalRecordController::class, 'index'])->name('admin/medical_records');
        Route::get('/admin/medical_records/create', [MedicalRecordController::class, 'create'])->name('admin/medical_records/create');
        Route::post('/admin/medical_records/store', [MedicalRecordController::class, 'store'])->name('admin/medical_records/store');
        Route::get('/admin/medical_records/edit/{id}', [MedicalRecordController::class, 'edit'])->name('admin/medical_records/edit');
        Route::put('/admin/medical_records/edit/{id}', [MedicalRecordController::class, 'update'])->name('admin/medical_records/update');
        Route::get('/admin/medical_records/delete/{id}', [MedicalRecordController::class, 'delete'])->name('admin/medical_records/delete');
        Route::get('admin/medical_records/trash', [MedicalRecordController::class, 'trash'])->name('admin/medical_records/trash');
        Route::get('admin/medical_records/restore/{id?}', [MedicalRecordController::class, 'restore'])->name('admin/medical_records/restore');
        Route::get('admin/medical_records/destroy/{id?}', [MedicalRecordController::class, 'destroy'])->name('admin/medical_records/destroy');

        Route::get('/admin/payments', [PaymentController::class, 'index'])->name('admin/payments');
        Route::get('/admin/payments/create', [PaymentController::class, 'create'])->name('admin/payments/create');
        Route::post('/admin/payments/store', [PaymentController::class, 'store'])->name('admin/payments/store');
        Route::get('/admin/payments/edit/{id}', [PaymentController::class, 'edit'])->name('admin/payments/edit');
        Route::put('/admin/payments/edit/{id}', [PaymentController::class, 'update'])->name('admin/payments/update');
        Route::get('/admin/payments/delete/{id}', [PaymentController::class, 'delete'])->name('admin/payments/delete');
        Route::get('admin/payments/trash', [PaymentController::class, 'trash'])->name('admin/payments/trash');
        Route::get('admin/payments/restore/{id?}', [PaymentController::class, 'restore'])->name('admin/payments/restore');
        Route::get('admin/payments/destroy/{id?}', [PaymentController::class, 'destroy'])->name('admin/payments/destroy');

        Route::get('/admin/health_informations', [HealthInformationController::class, 'index'])->name('admin/health_informations');
        Route::get('/admin/health_informations/create', [HealthInformationController::class, 'create'])->name('admin/health_informations/create');
        Route::post('/admin/health_informations/store', [HealthInformationController::class, 'store'])->name('admin/health_informations/store');
        Route::get('/admin/health_informations/edit/{id}', [HealthInformationController::class, 'edit'])->name('admin/health_informations/edit');
        Route::put('/admin/health_informations/edit/{id}', [HealthInformationController::class, 'update'])->name('admin/health_informations/update');
        Route::get('/admin/health_informations/delete/{id}', [HealthInformationController::class, 'delete'])->name('admin/health_informations/delete');
        Route::get('admin/health_informations/trash', [HealthInformationController::class, 'trash'])->name('admin/health_informations/trash');
        Route::get('admin/health_informations/restore/{id?}', [HealthInformationController::class, 'restore'])->name('admin/health_informations/restore');
        Route::get('admin/health_informations/destroy/{id?}', [HealthInformationController::class, 'destroy'])->name('admin/health_informations/destroy');

        Route::get('/admin/reviews', [ReviewController::class, 'index'])->name('admin/reviews');
        Route::get('/admin/reviews/create', [ReviewController::class, 'create'])->name('admin/reviews/create');
        Route::post('/admin/reviews/store', [ReviewController::class, 'store'])->name('admin/reviews/store');
        Route::get('/admin/reviews/edit/{id}', [ReviewController::class, 'edit'])->name('admin/reviews/edit');
        Route::put('/admin/reviews/edit/{id}', [ReviewController::class, 'update'])->name('admin/reviews/update');
        Route::get('/admin/reviews/delete/{id}', [ReviewController::class, 'delete'])->name('admin/reviews/delete');
        Route::get('admin/reviews/trash', [ReviewController::class, 'trash'])->name('admin/reviews/trash');
        Route::get('admin/reviews/restore/{id?}', [ReviewController::class, 'restore'])->name('admin/reviews/restore');
        Route::get('admin/reviews/destroy/{id?}', [ReviewController::class, 'destroy'])->name('admin/reviews/destroy');

        Route::get('/admin/user_list', [UserController::class, 'index'])->name('admin/user_list');
        Route::get('/admin/user_list/create', [UserController::class, 'create'])->name('admin/user_list/create');
        Route::post('/admin/user_list/store', [UserController::class, 'store'])->name('admin/user_list/store');
        Route::get('/admin/user_list/edit/{id}', [UserController::class, 'edit'])->name('admin/user_list/edit');
        Route::put('/admin/user_list/edit/{id}', [UserController::class, 'update'])->name('admin/user_list/update');
        Route::get('/admin/user_list/delete/{id}', [UserController::class, 'delete'])->name('admin/user_list/delete');
        Route::get('admin/user_list/trash', [UserController::class, 'trash'])->name('admin/user_list/trash');
        Route::get('admin/user_list/restore/{id?}', [UserController::class, 'restore'])->name('admin/user_list/restore');
        Route::get('admin/user_list/destroy/{id?}', [UserController::class, 'destroy'])->name('admin/user_list/destroy');


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
        Route::resource('reviews', ReviewController::class);
        Route::resource('user_list', UserController::class);
        Route::get('user/appointments', [UserAppointmentsController::class, 'index'])->name('user.appointments.index');
        Route::get('/online', [UserOnlineConsultationController::class, 'index'])->name('user.OnlineConsultation.index');




        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });




});


require __DIR__ . '/auth.php';



Route::get('/user', [UserDashboardController::class, 'index'])->name('user.dashboard.index');
Route::get('/about', [UserDashboardController::class, 'about'])->name('about2');
Route::get('/contact', [UserDashboardController::class, 'contact'])->name('contact2');
Route::get('/doctor_schedule', [UserScheduleController::class, 'index'])->name('doctor_schedule');
Route::get('user/medicalrecord', [UserMedicalRecordController::class, 'index'])->name('user.medicalrecord.index');


Route::get('/Information', [UserInformationController::class, 'index'])->name('user.Information.index');
Route::get('/information/{id}', [UserInformationController::class, 'show'])->name('user.information.show');
Route::get('/search', [HealthInformationController::class, 'search'])->name('search');

Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/payment-success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment-cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

Route::post('/online_consultations/store', [UserOnlineConsultationController::class, 'store'])->name('store-online-consultations');
Route::post('/store-consultation', [UserOnlineConsultationController::class, 'store'])->name('store-consultation');
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process-payment');
Route::put('set-appointment', [UserAppointmentsController::class, 'update'])->name('set-appointment');

Route::post('set-review', [ReviewController::class, 'store'])->name('set-review');
