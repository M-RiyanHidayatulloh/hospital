<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Room;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Appointments',
            'breadcrumbs' => [
                // 'Category' => "#",
            ],
            'appointments' => Appointment::paginate(5),
            'content' => 'admin.appointments.index',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $rooms = Room::all();

        $data = [
            'title' => 'Create Appointment',
            'breadcrumbs' => [
                // 'Category' => "#",
                'Appointments' => route('appointments.index'),
                'Create' => "#",
            ],
            'patients' => $patients,
            'doctors' => $doctors,
            'rooms' => $rooms,
            'content' => 'admin.appointments.create',
        ];

        return view("admin.wrapper", $data);
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
            return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
        } else {
            return back()->with('error', 'Failed to create appointment.');
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
    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $rooms = Room::all();

        $data = [
            'title' => 'Edit Appointment',
            'breadcrumbs' => [
                // 'Category' => "#",
                'Appointments' => route('appointments.index'),
                'Edit' => "#",
            ],
            'appointment' => $appointment,
            'patients' => $patients,
            'doctors' => $doctors,
            'rooms' => $rooms,
            'content' => 'admin.appointments.edit',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'status' => 'required',
            'room_id' => 'nullable|exists:rooms,id'
        ]);

        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
