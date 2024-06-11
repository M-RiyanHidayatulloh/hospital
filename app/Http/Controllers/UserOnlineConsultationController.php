<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class UserOnlineConsultationController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('user.OnlineConsultation.index', compact('doctors'));
    }

    public function chat(Doctor $doctor)
{
    return view('consultation.chat', compact('doctor'));
}
}
