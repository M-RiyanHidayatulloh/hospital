<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\OnlineConsultation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserOnlineConsultationController extends Controller
{
    public function index()
    {
        $doctor = User::where('usertype', 'doctor')->get();
        $patientId = Auth::user();

        return view('user.OnlineConsultation.index', compact('doctor', 'patientId'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'notes' => 'required'
        ]);

        $data['patient_id'] = Auth::user()->id;
        $data['doctor_id'] = $request->input('doctor_id');
        $data['consultation_date'] = Carbon::now()->tz('Asia/Jakarta');
        $data['notes'] = $request->input('notes');

        // $data

        OnlineConsultation::create($data);
        return redirect()->route('user.OnlineConsultation.index')->with('success', 'Room created successfully.');
    }
}
