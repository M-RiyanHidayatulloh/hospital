<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Room;
use App\Models\User;
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
        $patients = User::where('usertype', 'user')->get();
        $doctors = User::where('usertype', 'doctor')->get();
        $rooms = Room::all();
        return view('admin.appointments.create', compact('patients', 'doctors', 'rooms'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'patient_user_id' => 'required|exists:users,id,usertype,user',
            'doctor_user_id' => 'required|exists:users,id,usertype,doctor',
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
        $patients = User::where('usertype', 'user')->get();
        $doctors = User::where('usertype', 'doctor')->get();
        $rooms = Room::all();
        $appointment = Appointment::findOrFail($id);
        return view('admin.appointments.update', compact('appointment', 'doctors', 'patients', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $request->validate([
            'patient_user_id' => 'required|exists:users,id,usertype,user',
            'doctor_user_id' => 'required|exists:users,id,usertype,doctor',
            'room_id' => 'nullable|exists:rooms,id',
            'date' => 'required|date',
            'status' => 'required'
        ]);

        $appointment->update([
            'patient_user_id' => $request->patient_user_id,
            'doctor_user_id' => $request->doctor_user_id,
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

    public function trash() {
        $appointments = Appointment::onlyTrashed()->get();
         return view('admin.appointments.trash', compact('appointments'));
     }
 
     public function restore($id = null) {
         if($id != null) {
             $appointments = Appointment::onlyTrashed()
             ->where('id', $id)
             ->restore();
         } else {
             $appointments = Appointment::onlyTrashed()->restore();
         }
         return redirect()->route('admin/appointments/trash')->with('success', 'Appointment Data Was Restore');
     }
 
     public function destroy($id = null) {
         if($id != null) {
             $appointments = Appointment::onlyTrashed()
             ->where('id', $id)
             ->forceDelete();
         } else {
             $appointments = Appointment::onlyTrashed()->forceDelete();
         }
         return redirect()->route('admin/appointments/trash')->with('success', 'Appointment Data Was Delete Permanently');
     }
}
