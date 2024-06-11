<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorSchedule;

class DoctorScheduleeController extends Controller
{
    public function index()
    {
        return view('home.doctor_schedule.index');
    }
}
