<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Alert;
class DoctorController extends Controller
{
    public function index(): View
    {
        // $doctors = Doctor::onlyTrashed()->get();
        $doctors = Doctor::whereHas('user', function($query) {
            $query->where('usertype', 'doctor');
        })->get();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $users = User::where('usertype', 'doctor')->get();
        return view('admin.doctors.create', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validation = $request->validate([
            'user_id' => 'required|string|exists:users,id',
            'doctor_name' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'specialization' => 'required|min:5', 
            'phone' => 'required|string|min:5',      
            'available_times' => 'required|string|min:5',         
        ]);

        $image = $request->file('image');
        $image->storeAs('public/doctors', $image->hashName());

        $doctor = Doctor::create([
            'user_id' => $request->user_id,
            'doctor_name' => $request->doctor_name,
            'image' => $image->hashName(),
            'specialization' => $request->specialization,
            'phone' => $request->phone,
            'available_times' => $request->available_times
        ]);

        if ($doctor) {
            return redirect()->route('admin/doctors')->with('success', 'Doctor Data Was Added');
        } else {
            return redirect()->route('admin/doctors/create')->with('error', 'Some Problem Occurred');
        }
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $users = User::where('usertype', 'doctor')->get();
        return view('admin.doctors.update', compact('doctor', 'users'));
    }

    public function update(Request $request, $id)
{
    $doctor = Doctor::findOrFail($id);

    $request->validate([
        'doctor_name' => 'required|min:5',
        'specialization' => 'required|min:5',
        'phone' => 'required|string|min:5',
        'available_times' => 'required|string|min:5',
        'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
    ]);

    $doctor->update([
        'doctor_name' => $request->doctor_name,
        'specialization' => $request->specialization,
        'phone' => $request->phone,
        'available_times' => $request->available_times,
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image->storeAs('public/doctors', $image->hashName());
        $doctor->update(['image' => $image->hashName()]);
    }

    return redirect()->route('admin/doctors')->with('success', 'Doctor Data Was Changed');
}


    public function delete($id)
    {
        $doctor = Doctor::findOrFail($id)->delete();
        if ($doctor) {
            return redirect()->route('admin/doctors')->with('success', 'Doctor Was Deleted');
        } else {
            return redirect()->route('admin/doctors')->with('error', 'Delete Failed');
        }
    }

    public function trash() {
       $doctors = Doctor::onlyTrashed()->get();
        return view('admin.doctors.trash', compact('doctors'));
    }

    public function restore($id = null) {
        if($id != null) {
            $doctors = Doctor::onlyTrashed()
            ->where('id', $id)
            ->restore();
        } else {
            $doctors = Doctor::onlyTrashed()->restore();
        }
        return redirect()->route('admin/doctors/trash')->with('success', 'Doctor Was Restore');
    }

    public function destroy($id = null) {
        if($id != null) {
            $doctors = Doctor::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        } else {
            $doctors = Doctor::onlyTrashed()->forceDelete();
        }
        return redirect()->route('admin/doctors/trash')->with('success', 'Doctor Was Delete Permanently');
    }
}
