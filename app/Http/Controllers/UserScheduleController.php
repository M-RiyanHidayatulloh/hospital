<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class UserScheduleController extends Controller
{
    public function index()
    {
        $schedule = DoctorSchedule::all();
        return view('home.doctor_schedule.index', compact('doctor_schedules'));
    }
}
