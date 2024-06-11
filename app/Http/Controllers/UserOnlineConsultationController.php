<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class UserOnlineConsultationController extends Controller
{
    public function index()
    {
        $doctor = Doctor::all();
        return view('user.OnlineConsultation.index', compact('doctor'));
    }

    public function chat(Doctor $doctor)
    {
        return view('consultation.chat', compact('doctor'));
    }
}
