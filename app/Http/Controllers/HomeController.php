<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Room;
use App\Models\Appointment;
use App\Models\Queue;
use App\Models\Review;

class HomeController extends Controller
{

    public function home()
    {
        $doctor = Doctor::all();
        $review = Review::all();
        return view('home.index', compact('doctor','review'));
    }
    public function admin()
    {
        $doctor = Doctor::all()->count();
        $patient = Patient::all()->count();
        $room = Room::all()->count();
        $completed_appointment = Appointment::where('status','=', 'completed')->get()->count();
        $cancelled_appointment = Appointment::where('status','=', 'cancelled')->get()->count();
        $scheduled_appointment = Appointment::where('status','=', 'scheduled')->get()->count();
        $pending_queue = Queue::where('status','=', 'completed')->get()->count();
        $confirmed_queue = Queue::where('status','=', 'confirmed')->get()->count();
        $completed_queue = Queue::where('status','=', 'completed')->get()->count();
        $cancelled_queue = Queue::where('status','=', 'cancelled')->get()->count();
        return view('admin.dashboard.index', compact('doctor', 'patient', 'room', 'pending_queue','confirmed_queue','completed_queue','cancelled_queue', 'completed_appointment', 'cancelled_appointment', 'scheduled_appointment'));
    }

    public function user()
    {
        $doctor = Doctor::all();
        return view('home.index', compact('doctor'));
    }

    // public function doctor()
    // {
    //     return view('users.index');
    // }
}
