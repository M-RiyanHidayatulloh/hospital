<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAppointmentsController extends Controller
{
    public function index()
    {
        $auth = Auth::user()->id;
        $app = Appointment::where('user_id', $auth)->get();
        // $doctor =
        // dd($app);

        $data = [
            'doctors' => User::where('usertype', 'doctor')->get(),
            'rooms' => Room::all(),
            'appointments' => $app
        ];

        return view('user.Appointments.index', $data);
    }

    public function update(Request $request)
    {
        // dd($request);
        $status = 'Wait';
        // $doctorId = $request->input('doctor_id');

        Appointment::create([
            'user_id' => Auth::user()->id,
            'doctor_id' => $request->doctor_id,
            'room_id' => $request->room_id,
            'date' => $request->date,
            'status' => $status
        ]);

        return redirect()->back()->with('success', 'Berhasil');
    }
}
