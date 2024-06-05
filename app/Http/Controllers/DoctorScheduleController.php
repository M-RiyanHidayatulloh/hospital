<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Doctor Schedules',
            'breadcrumbs' => [
                // 'Category' => "#",
            ],
            'doctor_schedules' => DoctorSchedule::all(),
            'content' => 'admin.doctor_schedules.index',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all();
        $data = [
            'title' => 'Create Doctor Schedule',
            'breadcrumbs' => [
                // 'Category' => "#",
                'Doctor Schedules' => route('doctor_schedules.index'),
                'Create' => "#",
            ],
            'doctors' => $doctors,
            'content' => 'admin.doctor_schedules.create',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day_of_week' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        DoctorSchedule::create($validatedData);

        \Log::info('Schedule stored successfully.');

        return redirect()->route('doctor_schedules.index')->with('success', 'Doctor Schedule added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DoctorSchedule $doctorSchedule)
    {
        return view('doctor_schedules.show', compact('doctorSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoctorSchedule $doctorSchedule)
    {
        $doctors = Doctor::all();
        $data = [
            'title' => 'Edit Doctor Schedule',
            'breadcrumbs' => [
                // 'Category' => "#",
                'Doctor Schedules' => route('doctor_schedules.index'),
                'Edit' => "#",
            ],
            'doctor_schedule' => $doctorSchedule,
            'doctors' => $doctors,
            'content' => 'admin.doctor_schedules.edit',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DoctorSchedule $doctorSchedule)
    {
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day_of_week' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $doctorSchedule->update($validatedData);

        return redirect()->route('doctor_schedules.index')->with('success', 'Doctor Schedule updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoctorSchedule $doctorSchedule)
    {
        $doctorSchedule->delete();
        return redirect()->route('doctor_schedules.index')->with('success', 'Doctor Schedule deleted successfully.');
    }
}
