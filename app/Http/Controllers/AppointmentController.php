<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Room;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::latest()->paginate(5);

        $appointments = Appointment::orderBy('id', 'desc')->get();
        $appointments = Appointment::count();
        $appointments = Appointment::all();
        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $rooms = Room::all();

        return view('admin.appointments.create', compact('patients', 'doctors', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'room_id' => 'nullable|exists:rooms,id',
            'date' => 'required|date',
            'status' => 'required'
        ]);

        $appointment = Appointment::create($data);

        if ($appointment) {
            return redirect()->route('admin/appointments')->with('success', 'Appointment created successfully.');
        } else {
            return redirect()->route('admin/appointments/create')->with('error', 'Some Problem Occurred');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        $rooms = Room::all();
        return view('admin.appointments.update', compact('appointment', 'doctors', 'patients', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'status' => 'required',
            'room_id' => 'nullable|exists:rooms,id'
        ]);

        $appointment->update([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'date' => $request->date,
            'status' => $request->status,
            'room_id' => $request->room_id,
        ]);

        $appointment->update($request->all());

        return redirect()->route('admin/appointments')->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $appointment = Appointment::findOrFail($id)->delete();
        if($appointment) {
            return redirect()->route('admin/appointments')->with('success', 'Appointment Data Was Deleted');
        } else {
            return redirect()->route('admin/appointments')->with('error', 'Appointment Delete Fail');
        }
    }
}
