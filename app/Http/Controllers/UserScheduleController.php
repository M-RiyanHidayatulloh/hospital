<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorSchedule;

class UserScheduleController extends Controller
{
    public function index()
    {
        $schedule = DoctorSchedule::all();
        return view('user.doctor_schedule.index', compact('schedule'));
    }
}
