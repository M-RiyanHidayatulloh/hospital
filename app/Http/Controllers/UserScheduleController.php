<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorSchedule;
use App\Models\User;

class UserScheduleController extends Controller
{
    public function index()
    {
        $schedule = DoctorSchedule::all();
        $user = User::all();
        return view('user.doctor_schedule.index', compact('schedule', 'user'));
    }
}
