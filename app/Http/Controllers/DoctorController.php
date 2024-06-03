<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Doctors',
            'breadcrumbs' => [
                // 'Category' => "#",
            ],
            'doctors' => Doctor::all(),
            'content' => 'admin.doctors.index',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $data = [
            'title' => 'Create Doctor',
            'breadcrumbs' => [
                'Doctors' => route('doctors.index'),
                'Create' => "#",
            ],
            'users' => $users,
            'content' => 'admin.doctors.create',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'available_times' => 'required|string|max:255',
        ]);

        Doctor::create($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $users = User::all();
        $data = [
            'title' => 'Edit Doctor',
            'breadcrumbs' => [
                'Doctors' => route('doctors.index'),
                'Edit' => "#",
            ],
            'doctor' => $doctor,
            'users' => $users,
            'content' => 'admin.doctors.edit',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'specialization' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'available_times' => 'required|string|max:255',
        ]);

        $doctor->update($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
